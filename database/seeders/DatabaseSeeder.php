<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Modules\Appointments\Database\Seeders\AppointmentSeeder;
use Modules\Appointments\Models\Appointment;
use Modules\Appointments\Models\AppointmentSetting;
use Modules\Appointments\Models\ClosedSlot;
use Modules\Appointments\Models\WorkingHour;
use Modules\Customers\Database\Seeders\CustomerSeeder;
use Modules\Customers\Models\Customer;
use Modules\Customers\Models\CustomerNote;
use Modules\Customers\Models\CustomerTopic;
use Modules\Users\Database\Seeders\UserSeeder;
use Modules\Users\Models\User;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(UserSeeder::class);

        $user = User::first();

        $customers = Customer::factory(20)->create();

        CustomerNote::factory(20)->recycle($customers)->create();
        CustomerTopic::factory(20)->recycle($customers)->create();

        AppointmentSetting::factory()->for($user)->create();
        WorkingHour::factory()->for($user)->create();
        ClosedSlot::factory()->for($user)->create();
        Appointment::factory(20)->for($user)->recycle($customers)->create();
    }
}
