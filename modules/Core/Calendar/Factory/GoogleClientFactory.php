<?php

declare(strict_types=1);

namespace Modules\Core\Calendar\Factory;

use Google\Client;
use Modules\Core\OAuth\Dto\GoogleTokenDto;

final class GoogleClientFactory
{
    public static function createGoogleClient(GoogleTokenDto $googleTokenDto): Client
    {
        $client = new Client();

        $client->setClientId(config('services.google.client_id'));
        $client->setClientSecret(config('services.google.client_secret'));

        $client->setAccessToken([
            'access_token' => $googleTokenDto->accessToken,
            'refresh_token' => $googleTokenDto->refreshToken,
        ]);

        return $client;
    }
}
