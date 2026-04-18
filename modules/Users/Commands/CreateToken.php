<?php

declare(strict_types=1);

namespace Modules\Users\Commands;

use Modules\Core\OAuth\Dto\TokenDto;
use Modules\Users\Database\Repositories\TokenRepository;

readonly class CreateToken
{
    public function __construct(
        private int $userId,
        private TokenDto $tokenDto,
        private TokenRepository $tokenRepository
    ) {}

    public function handle(): void
    {
        $this->tokenRepository->createToken($this->userId, $this->tokenDto);
    }
}
