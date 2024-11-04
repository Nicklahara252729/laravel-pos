<?php

namespace App\Exports\Backoffice\Pelanggan;

/**
 * import models
 */

use App\Models\Stakeholder\Customer\Customer;

/**
 * import component
 */

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PelangganExport implements FromQuery, WithHeadings
{
    use Exportable;

    private $uuidOutlet;

    public function __construct(string $uuidOutlet)
    {
        $this->uuidOutlet = $uuidOutlet;
    }

    public function query()
    {
        return Customer::query()
            ->select(
                DB::raw('(SELECT outlet_name FROM outlets WHERE uuid_outlet = customers.uuid_outlet) AS outlet'),
                'name',
                'email',
                'phone',
                'birthday',
                'gender',
                'address',
                'city',
                'state',
                'zip_code',
                DB::raw("DATE_FORMAT(created_at, '%d/%m/%Y') AS tgl_bergabung")
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
            'Tanggal Lahir',
            'Jenis Kelamin',
            'Alamat',
            'Kota',
            'Kecamatan',
            'Kode POS',
            'Tanggal Bergabung',
        ];
    }
}
