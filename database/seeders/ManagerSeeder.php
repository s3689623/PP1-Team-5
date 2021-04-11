<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class ManagerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admins = [
            [
                'username' => 'MANAGER',
                'password' => Hash::make('MANAGER'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        // Create Administrators
        DB::statement("SET foreign_key_checks=0");
        DB::table('managers')->truncate();
        DB::statement("SET foreign_key_checks=1");
        DB::table('managers')->insert($admins);
    }
}
