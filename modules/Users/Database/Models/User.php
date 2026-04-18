<?php

declare(strict_types=1);

namespace Modules\Users\Database\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Modules\Appointments\Database\Models\WorkingSchedule;
use Modules\Appointments\Models\Appointment;
use Modules\Users\Database\Factories\UserFactory;
use Modules\Users\Database\Models\UserProvider;

final class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'nickname',
        'email',
        'email_verified_at',
        'password',
        'role',
        'avatar',
    ];

    protected $hidden = [
        'password',
        'remember_token',
        'access_token',
        'refresh_token',
    ];

    protected $casts = [
        'token_expires_at' => 'datetime',
        'email_verified_at' => 'datetime',
    ];

    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    public function isManager(): bool
    {
        return $this->role === 'manager';
    }

    public function canAccessDashboard(): bool
    {
        return $this->isAdmin() || $this->isManager();
    }

    public function redirectRoute(): string
    {
        return $this->canAccessDashboard() ? 'dashboard' : 'home';
    }

    public function appointments(): HasMany
    {
        return $this->hasMany(Appointment::class);
    }

    public function workingHours(): HasMany
    {
        return $this->hasMany(WorkingSchedule::class);
    }

    public function providers(): HasMany
    {
        return $this->hasMany(UserProvider::class);
    }

    protected static function newFactory(): UserFactory
    {
        return new UserFactory();
    }
}
