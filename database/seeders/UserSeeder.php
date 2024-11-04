<?php

namespace Database\Seeders;

/**
 * import component
 */

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Ramsey\Uuid\Uuid;

/**
 * import models
 */

use App\Models\User\User\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $getOutlet = \App\Models\Outlet\Outlet::first();
        $level = ['superadmin', 'owner', 'employee'];
        foreach ($level as $key => $value) :

            if ($value == 'employee') :
                $access = \App\Models\User\Access\Access::get();
                foreach ($access as $key => $valAccess) :
                    $uuidUser = Uuid::uuid4()->getHex();
                    User::create([
                        'uuid_user'   => $uuidUser,
                        'uuid_access' => $valAccess->uuid_access,
                        'uuid_outlet' => $getOutlet->uuid_outlet,
                        'name'        => ucwords($valAccess->access_name),
                        'email'       => ucwords($valAccess->access_name) . "@gmail.com",
                        'password'    => bcrypt("password"),
                        'username'    => $value,
                        'pin'         =>  123,
                        'level'       => $value,
                        'phone'       => '083314123222'
                    ]);

                    \App\Models\User\PinAccess\PinAccess::create([
                        'uuid_pin_access' => Uuid::uuid4()->getHex(),
                        'uuid_user' => $uuidUser
                    ]);
                endforeach;
            else :
                User::create([
                    'uuid_user'   => Uuid::uuid4()->getHex(),
                    'uuid_access' => null,
                    'uuid_outlet' => null,
                    'name'        => ucwords($value),
                    'email'       => ucwords($value) . "@gmail.com",
                    'password'    => bcrypt("password"),
                    'username'    => $value,
                    'pin'         =>  null,
                    'level'       => $value,
                    'phone'       => '083314123222'
                ]);
            endif;
        endforeach;
    }
}
