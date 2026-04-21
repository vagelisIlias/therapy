<?php

declare(strict_types=1);

namespace Modules\Core\Calendar\Contracts;

use Modules\Core\OAuth\Dto\TokenDto;
use Google\Client;

interface GoogleClient
{
    public function createGoogleClient(TokenDto $tokenDto): Client;
}
