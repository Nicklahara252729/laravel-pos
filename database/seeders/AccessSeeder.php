<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Ramsey\Uuid\Uuid;

class AccessSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $getOutlet = \App\Models\Outlet\Outlet::first();
        $access = ['cashier', 'capster'];
        foreach ($access as $key => $value) :
            \App\Models\User\Access\Access::create([
                'uuid_access' => Uuid::uuid4()->getHex(),
                'uuid_outlet' => $getOutlet->uuid_outlet,
                'access_name' => $value
            ]);
        endforeach;
    }
}
