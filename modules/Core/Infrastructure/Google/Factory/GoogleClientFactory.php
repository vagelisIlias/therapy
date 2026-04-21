<?php

declare(strict_types=1);

namespace Modules\Core\Calendar\Google\Factory;

use Google\Client;
use Modules\Core\Calendar\Contracts\GoogleClient;
use Modules\Core\OAuth\Dto\TokenDto;

final class GoogleClientFactory implements GoogleClient
{
    public function createGoogleClient(TokenDto $tokenDto): Client
    {
        $client = new Client();

        $client->setClientId(config('services.google.client_id'));
        $client->setClientSecret(config('services.google.client_secret'));

        $client->setAccessToken([
            'access_token' => $tokenDto->accessToken,
            'refresh_token' => $tokenDto->refreshToken,
        ]);

        return $client;
    }
}
