<?php

declare(strict_types=1);

namespace Modules\Core\Calendar\Services;

use Google\Client;
use Modules\Core\Calendar\Factory\GoogleClientFactory;
use Modules\Core\Calendar\Services\GoogleAuthenticateClient;
use Modules\Core\Database\GoogleTokenProvider;
use Modules\Core\OAuth\Dto\GoogleTokenDto;

final readonly class GoogleAuthenticateClientService implements GoogleAuthenticateClient
{
     public function __construct(
        private GoogleTokenProvider $googleTokenProvider,
    ) {}

    public function authenticatedClient(int $userId, GoogleTokenDto $googleTokenDto): Client
    {
        $client = GoogleClientFactory::createGoogleClient($googleTokenDto);

        if ($client->isAccessTokenExpired()) {
            $newToken = $client->fetchAccessTokenWithRefreshToken($googleTokenDto->refreshToken);

            $updatedDto = GoogleTokenDto::mapFromGoogle(
                    $googleTokenDto,
                    $newToken['access_token'],
                    $newToken['expires_in']
            );

            $this->googleTokenProvider->updateToken($userId, $updatedDto);
        }

        return $client;
    }
}
