<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\OutletSeeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\AccessSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call([
            OutletSeeder::class,
            AccessSeeder::class,
            UserSeeder::class
        ]);
    }
}
