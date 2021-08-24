<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class FirstDataSeeder extends Seeder {
    public function run() {
        \App\Models\Role::create(['description' => 'admin']);
        \App\Models\Role::create(['description' => 'manager']);
        \App\Models\Role::create(['description' => 'customer']);

        \App\Models\RentalStatuse::create(['description' => 'rental start']);
        \App\Models\RentalStatuse::create(['description' => 'rental end']);
        \App\Models\RentalStatuse::create(['description' => 'rental booked']);

        \App\Models\RentalPoint::create(['address' => 'Баумана 2 а']);
        \App\Models\RentalPoint::create(['address' => 'Набережная']);

        \App\Models\Scooter::create(['description' => 'City-Ride']);
        \App\Models\Scooter::create(['description' => 'XIAOMI Mi Electric']);

        \App\Models\User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin'),
            'role_id' => 1
        ]);
        \App\Models\User::create([
            'name' => 'manager',
            'email' => 'manager@manager.com',
            'password' => bcrypt('manager'),
            'role_id' => 2
        ]);
        \App\Models\User::create([
            'name' => 'customer',
            'email' => 'customer@customer.com',
            'password' => bcrypt('customer'),
            'role_id' => 3
        ]);

    }
}
