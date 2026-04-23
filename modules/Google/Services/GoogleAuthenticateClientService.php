<?php

declare(strict_types=1);

namespace Modules\Google\Services;

use Google\Client;
use Modules\Core\Calendar\Contracts\GoogleAuthenticateClient;
use Modules\Core\Calendar\Contracts\GoogleClient;
use Modules\Core\Database\Contracts\TokenProvider;
use Modules\Core\OAuth\Dto\TokenDto;

final readonly class GoogleAuthenticateClientService implements GoogleAuthenticateClient
{
     public function __construct(
        private TokenProvider $tokenProvider,
        private GoogleClient $googleClient
    ) {}

    public function authenticatedClient(int $userId, TokenDto $tokenDto): Client
    {
        $client = $this->googleClient->createGoogleClient($tokenDto);

        if ($client->isAccessTokenExpired()) {
            $newToken = $client->fetchAccessTokenWithRefreshToken($tokenDto->refreshToken);

            $updatedDto = TokenDto::mapFromGoogle(
                    $tokenDto,
                    $newToken['access_token'],
                    $newToken['expires_in']
            );

            $this->tokenProvider->updateToken($userId, $updatedDto);
        }

        return $client;
    }
}
