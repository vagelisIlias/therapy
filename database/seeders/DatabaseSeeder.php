<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Modules\Appointments\Database\Seeders\AppointmentSeeder;
use Modules\Appointments\Models\Appointment;
use Modules\Appointments\Models\AppointmentSetting;
use Modules\Appointments\Models\BlockedSlot;
use Modules\Appointments\Models\WorkingHour;
use Modules\Customers\Database\Seeders\CustomerSeeder;
use Modules\Customers\Models\Customer;
use Modules\Customers\Models\CustomerNote;
use Modules\Customers\Models\CustomerTopic;
use Modules\Users\Database\Seeders\UserSeeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            CustomerSeeder::class,
            AppointmentSeeder::class,
        ]);

        $customers = Customer::factory(10)->create();
        CustomerNote::factory(10)->recycle($customers)->create();
        CustomerTopic::factory(10)->recycle($customers)->create();

        $appointments = Appointment::factory(10)->create();
        WorkingHour::factory(10)->recycle($appointments)->create();
        BlockedSlot::factory(10)->recycle($appointments)->create();
        AppointmentSetting::factory(10)->recycle($appointments)->create();
    }
}
