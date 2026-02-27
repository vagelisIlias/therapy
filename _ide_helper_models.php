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


namespace Modules\Appointments\Models{
/**
 * @property int $id
 * @property string $appointment_uuid
 * @property int $user_id
 * @property int $customer_id
 * @property string $status
 * @property \Illuminate\Support\Carbon $start_time
 * @property \Illuminate\Support\Carbon $end_time
 * @property int|null $duration
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Modules\Customers\Models\Customer $customer
 * @property-read \Modules\Users\Models\User $user
 * @method static \Modules\Appointments\Database\Factories\AppointmentFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Appointment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Appointment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Appointment query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Appointment whereAppointmentUuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Appointment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Appointment whereCustomerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Appointment whereDuration($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Appointment whereEndTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Appointment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Appointment whereStartTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Appointment whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Appointment whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Appointment whereUserId($value)
 */
	class Appointment extends \Eloquent {}
}

namespace Modules\Appointments\Models{
/**
 * @property int $id
 * @property int $user_id
 * @property int $session_duration
 * @property int $break_between_sessions
 * @property int $max_sessions_per_day
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Modules\Users\Models\User $user
 * @method static \Modules\Appointments\Database\Factories\AppointmentSettingFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AppointmentSetting newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AppointmentSetting newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AppointmentSetting query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AppointmentSetting whereBreakBetweenSessions($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AppointmentSetting whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AppointmentSetting whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AppointmentSetting whereMaxSessionsPerDay($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AppointmentSetting whereSessionDuration($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AppointmentSetting whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AppointmentSetting whereUserId($value)
 */
	class AppointmentSetting extends \Eloquent {}
}

namespace Modules\Appointments\Models{
/**
 * @property int $id
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $start_time
 * @property \Illuminate\Support\Carbon|null $end_time
 * @property string|null $reason
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Modules\Users\Models\User $user
 * @method static \Modules\Appointments\Database\Factories\ClosedSlotFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ClosedSlot newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ClosedSlot newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ClosedSlot query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ClosedSlot whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ClosedSlot whereEndTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ClosedSlot whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ClosedSlot whereReason($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ClosedSlot whereStartTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ClosedSlot whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ClosedSlot whereUserId($value)
 */
	class ClosedSlot extends \Eloquent {}
}

namespace Modules\Appointments\Models{
/**
 * @property int $id
 * @property int $user_id
 * @property int $day_of_week
 * @property string|null $start_time
 * @property string|null $end_time
 * @property bool $is_closed
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Modules\Users\Models\User|null $user
 * @method static \Modules\Appointments\Database\Factories\WorkingHourFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|WorkingHour newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|WorkingHour newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|WorkingHour query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|WorkingHour whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|WorkingHour whereDayOfWeek($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|WorkingHour whereEndTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|WorkingHour whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|WorkingHour whereIsClosed($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|WorkingHour whereStartTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|WorkingHour whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|WorkingHour whereUserId($value)
 */
	class WorkingHour extends \Eloquent {}
}

namespace Modules\Customers\Models{
/**
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property string|null $date_of_birth
 * @property string $phone
 * @property int $total_bookings
 * @property int $total_completed
 * @property int $total_cancelled
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Modules\Customers\Models\CustomerTopic> $topics
 * @property-read int|null $topics_count
 * @method static \Modules\Customers\Database\Factories\CustomerFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Customer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Customer newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Customer query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Customer whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Customer whereDateOfBirth($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Customer whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Customer whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Customer whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Customer whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Customer wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Customer whereTotalBookings($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Customer whereTotalCancelled($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Customer whereTotalCompleted($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Customer whereUpdatedAt($value)
 */
	class Customer extends \Eloquent {}
}

namespace Modules\Customers\Models{
/**
 * @property int $id
 * @property int $customer_id
 * @property int $customer_topic_id
 * @property string $content
 * @property string|null $homework
 * @property string|null $summary
 * @property int|null $intensity_scale
 * @property \Illuminate\Support\Carbon|null $started_at
 * @property \Illuminate\Support\Carbon|null $improved_at
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Modules\Customers\Models\CustomerTopic|null $topics
 * @method static \Modules\Customers\Database\Factories\CustomerNoteFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CustomerNote newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CustomerNote newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CustomerNote query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CustomerNote whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CustomerNote whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CustomerNote whereCustomerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CustomerNote whereCustomerTopicId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CustomerNote whereHomework($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CustomerNote whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CustomerNote whereImprovedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CustomerNote whereIntensityScale($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CustomerNote whereStartedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CustomerNote whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CustomerNote whereSummary($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CustomerNote whereUpdatedAt($value)
 */
	class CustomerNote extends \Eloquent {}
}

namespace Modules\Customers\Models{
/**
 * @property int $id
 * @property int $customer_id
 * @property string $name
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Modules\Customers\Models\Customer $customer
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Modules\Customers\Models\CustomerNote> $notes
 * @property-read int|null $notes_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @method static \Modules\Customers\Database\Factories\CustomerTopicFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CustomerTopic newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CustomerTopic newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CustomerTopic query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CustomerTopic whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CustomerTopic whereCustomerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CustomerTopic whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CustomerTopic whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CustomerTopic whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CustomerTopic whereUpdatedAt($value)
 */
	class CustomerTopic extends \Eloquent {}
}

namespace Modules\Users\Models{
/**
 * @property int $id
 * @property string $name
 * @property string|null $nickname
 * @property string $email
 * @property string $role
 * @property string|null $google_id
 * @property string|null $avatar
 * @property string|null $access_token
 * @property string|null $refresh_token
 * @property \Illuminate\Support\Carbon|null $token_expires_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Modules\Appointments\Models\Appointment> $appointments
 * @property-read int|null $appointments_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Modules\Appointments\Models\WorkingHour> $workingHours
 * @property-read int|null $working_hours_count
 * @method static \Modules\Users\Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereAccessToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereAvatar($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereGoogleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereNickname($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereRefreshToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereRole($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereTokenExpiresAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereUpdatedAt($value)
 */
	final class User extends \Eloquent {}
}

