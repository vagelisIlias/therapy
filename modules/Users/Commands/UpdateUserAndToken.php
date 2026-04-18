<?php

declare(strict_types=1);

namespace Modules\Users\Commands;

use Modules\Core\OAuth\Dto\UserDto;
use Modules\Users\Database\Repositories\TokenRepository;

readonly class UpdateUserAndToken
{
    public function __construct(
        private int $userId,
        private UserDto $userDto,
        private TokenRepository $tokenRepository
    ) {}

    public function handle(): void
    {
       $this->tokenRepository->updateSocialTokenAndUser($this->userId, $this->userDto);
    }
}
