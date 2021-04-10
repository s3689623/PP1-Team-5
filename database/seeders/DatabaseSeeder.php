<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AdminSeeder::class);
        $this->call(MakesSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(CarSeeder::class);
        $this->call(LicenseSeeder::class);
        $this->call(ParkingSeeder::class);
    }
}
