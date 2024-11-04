<?php

namespace Database\Seeders;

/**
 * import component
 */

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

/**
 * import models
 */

use App\Models\GeneralSetting\GeneralSetting\GeneralSetting;

class GeneralSettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'setting_name' => 'daily sales summary',
                'description' => null,
            ],
            [
                'setting_name' => 'inventory alert',
                'description' => null,
            ],

            [
                'setting_name' => 'enable tax',
                'description' => null
            ],
            [
                'setting_name' => 'enable gratuity',
                'description' => null
            ],
            [
                'setting_name' => 'add tax and gratuity',
                'description' => null
            ],
            [
                'setting_name' => 'include tax and gratuity',
                'description' => null
            ],
            [
                'setting_name' => 'enable rounding',
                'description' => null
            ],
            [
                'setting_name' => 'enable stock limit',
                'description' => null
            ],
            [
                'setting_name' => 'track server',
                'description' => null
            ],
            [
                'setting_name' => 'logo',
                'description' => 'logo.png'
            ],
            [
                'setting_name' => 'application name',
                'description' => 'Leven Poin Of Sales'
            ]
        ];

        foreach ($data as $value) :
            GeneralSetting::create([
                'setting_name'          => $value['setting_name'],
                'description'           => $value['description'],
            ]);
        endforeach;
    }
}
