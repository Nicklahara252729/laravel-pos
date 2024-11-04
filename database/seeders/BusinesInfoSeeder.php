<?php

namespace Database\Seeders;

use App\Models\BusinessInfo\BusinessInfo;
use App\Models\User\User\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BusinesInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $uuidUser = User::where('level', 'owner')->first()->uuid_user;
        BusinessInfo::create([
            'uuid_user' => $uuidUser,
            'business_name' => '-',
            'business_address' => '-',
            'id_province' => '-',
            'id_city' => '-',
            'id_district' => '-',
            'postal_code' => '-',
            'nik_name' => '-',
            'nik' => '-'
        ]);
    }
}
