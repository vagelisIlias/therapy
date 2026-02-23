<?php

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */

namespace Modules\Users\Database\Models{
/**
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @method static \Modules\Users\Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|\Modules\Users\Models\User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|\Modules\Users\Models\User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|\Modules\Users\Models\User query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|\Modules\Users\Models\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|\Modules\Users\Models\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|\Modules\Users\Models\User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|\Modules\Users\Models\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|\Modules\Users\Models\User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|\Modules\Users\Models\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|\Modules\Users\Models\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|\Modules\Users\Models\User whereUpdatedAt($value)
 */
	final class User extends \Eloquent {}
}

