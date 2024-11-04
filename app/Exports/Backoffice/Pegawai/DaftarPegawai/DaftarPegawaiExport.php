<?php

namespace App\Exports\Backoffice\Pegawai\DaftarPegawai;

/**
 * import models
 */

use App\Models\User\User\User;

/**
 * import component
 */

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DaftarPegawaiExport implements FromQuery, WithHeadings
{
    use Exportable;

    private $uuidOutlet;

    public function __construct(string $uuidOutlet)
    {
        $this->uuidOutlet = $uuidOutlet;
    }

    public function query()
    {
        return User::query()
            ->select(
                DB::raw('(SELECT outlet_name FROM outlets WHERE uuid_outlet = users.uuid_outlet) AS outlet'),
                'name',
                'email',
                'phone',
                'pin',
                'level',
                DB::raw('(SELECT access_name FROM accesses WHERE uuid_access = users.uuid_access) AS akses')
            )
            ->where('uuid_outlet', $this->uuidOutlet);
    }

    public function headings(): array
    {
        return [
            'Outlet',
            'Nama',
            'Email',
            'No Telp',
            'PIN Akses',
            'Level Pengguna',
            'Hak Akses'
        ];
    }
}
