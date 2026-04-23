<?php

declare(strict_types=1);

namespace Modules\Core\Calendar\Contracts;

use Google\Client;
use Modules\Core\OAuth\Dto\TokenDto;

interface GoogleAuthenticateClient
{
    public function authenticatedClient(int $userId, TokenDto $tokenDto): Client;
}
