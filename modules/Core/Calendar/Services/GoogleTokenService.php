<?php

declare(strict_types=1);

namespace Modules\Core\Calendar\Services;

use Google\Client;
use Modules\Core\Calendar\Factory\GoogleClientFactory;
use Modules\Core\Calendar\Services\GoogleToken;
use Modules\Core\Database\GoogleTokenProvider;
use Modules\Core\OAuth\Dto\GoogleTokenDto;

final readonly class GoogleTokenService implements GoogleToken
{
     public function __construct(
        private GoogleTokenProvider $googleTokenProvider,
    ) {}

    public function authenticatedClient(int $userId, GoogleTokenDto $googleTokenDto): Client
    {
        $client = GoogleClientFactory::createGoogleClient($googleTokenDto);

        if ($client->isAccessTokenExpired()) {
            $newToken = $client->fetchAccessTokenWithRefreshToken($googleTokenDto->refreshToken);

            $updatedDto = new GoogleTokenDto(
                $googleTokenDto->providerId,
                $googleTokenDto->provider,
                $newToken['access_token'],
                $googleTokenDto->refreshToken,
                now()->addSeconds($newToken['expires_in'])
            );

            $this->googleTokenProvider->updateToken($userId, $updatedDto);
        }

        return $client;
    }
}
