<?php

declare(strict_types=1);

namespace Modules\Users\Commands;

use Modules\Core\OAuth\Dto\TokenDto;
use Modules\Users\Database\Repositories\TokenRepository;

readonly class UpdateToken
{
    public function __construct(
        private int $userId,
        private TokenDto $tokenDto,
        private TokenRepository $tokenRepository
    ) {}

    public function handle()
    {
        $this->tokenRepository->updateToken($this->userId, $this->tokenDto);
    }
}
