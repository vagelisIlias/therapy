<?php

declare(strict_types=1);

namespace Modules\Core\Calendar\Services;

use Google\Client;
use Modules\Core\Calendar\Factory\GoogleClientFactory;
use Modules\Core\Calendar\Services\GoogleAuthenticateClient;
use Modules\Core\Database\TokenProvider;
use Modules\Core\OAuth\Dto\TokenDto;

final readonly class GoogleAuthenticateClientService implements GoogleAuthenticateClient
{
     public function __construct(
        private TokenProvider $tokenProvider,
        private GoogleClientFactory $googleClientFactory
    ) {}

    public function authenticatedClient(int $userId, TokenDto $tokenDto): Client
    {
        $client = $this->googleClientFactory->createGoogleClient($tokenDto);

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
