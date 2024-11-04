<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Ramsey\Uuid\Uuid;

class OutletSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Outlet\Outlet::create([
            'uuid_outlet'   => Uuid::uuid4()->getHex(),
            'outlet_name' => 'Leven Barber Seminyak',
            'address' => 'Jl. Seminyak 123',
            'id_province' => 11,
            'id_city' => 1101,
            'id_district' => 1101010,
            'postal_code' => 20118,
            'phone_number' => '085512313351',
            'logo' => 'logo.jpg'
        ]);
    }
}
