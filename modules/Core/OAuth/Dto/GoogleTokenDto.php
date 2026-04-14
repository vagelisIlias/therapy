<?php

declare(strict_types=1);

namespace Modules\Core\OAuth\Dto;

use Carbon\Carbon;
use Modules\Core\Database\Enums\SocialProvider;

readonly class GoogleTokenDto
{
    public function __construct(
        public string $providerId,
        public SocialProvider $provider,
        public string $accessToken,
        public ?string $refreshToken = null,
        public ?Carbon $expiresAt = null
    ) {
    }

    /**
     * Using fromGoogle mainly to save [ Provider, providerID, Token, RefreshToken, ExpiresIn ] and especial the expiresAt field
     * coming as expiresIn from Google, so we can convert it to Carbon instance and map it on expiresAt.
     * @param object $google
     * @return self
     */
    public static function mapFromGoogle(object $google): self
    {
        return new self(
            $google->getId(),
            SocialProvider::GOOGLE,
            $google->token,
            $google->refreshToken,
            $google->expiresIn ? now()->addSeconds((int) $google->expiresIn) : null,
        );
    }
}
