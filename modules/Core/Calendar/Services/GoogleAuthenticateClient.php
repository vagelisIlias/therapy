<?php

declare(strict_types=1);

namespace Modules\Core\Calendar\Services;

use Google\Client;
use Modules\Core\OAuth\Dto\GoogleTokenDto;

interface GoogleAuthenticateClient
{
    public function authenticatedClient(int $userId, GoogleTokenDto $googleTokenDto): Client;
}
