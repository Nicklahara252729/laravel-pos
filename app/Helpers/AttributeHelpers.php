<?php

/**
 * import component
 */

use Illuminate\Support\Facades\Auth;

/**
 * import helper
 */

use App\Helpers\CheckerHelpers;

/**
 * global atribute
 */
function globalAttribute()
{
    return [
        'uriSegment1' => request()->segment(1),
        'uriSegment2' => request()->segment(2),
        'uriSegment3' => request()->segment(3),
        'uriSegment4' => request()->segment(4),
        'uriSegment5' => request()->segment(5),
        'fbUrl'       => 'https://www.facebook.com/',
        'twitterUrl'  => 'https://twitter.com/',
        'igUrl'       => 'https://www.instagram.com/'
    ];
}

/**
 * auth attribute
 */
function authAttribute()
{
    return [
        'uuidUser'   => Auth::user()->uuid_user,
        'level'      => Auth::user()->level,
        'uuidOutlet' => Auth::user()->uuid_outlet,
        'uuidAccess' => Auth::user()->uuid_access,
        'email'      => Auth::user()->email,
        'phone'      => Auth::user()->phone,
    ];
}

/** 
 * menu splitting by level
 */
function menuSplitting()
{
    $checkerHelper = new CheckerHelpers();
    return $checkerHelper->accessChecker(['uuid_access' => Auth::user()->uuid_access]);
}

/**
 * asset attribute
 */
function assetAttribute($param)
{
    $checkerHelper = new CheckerHelpers();
    return $checkerHelper->generalSettingChecker($param)->description;
}

/**
 * breadctrumb attribute
 */
function breadcrumbAttribute()
{
    return [
        'Dashboard',
        'Laporan Penjualan',
        'Riwayat Transaksi',
        'Pembayaran',
        'Produk',
        'Bahan dan Resep',
        'Inventori',
        'Pelanggan',
        'Pegawai',
        'Outlet',
        'Daftar Outlet',
        'Akun',
        'Dokumentasi',
        'Notifikasi',
        'Pengaturan'
    ];
}


/**
 * images path
 */
function path($type)
{
    $key  = "type";
    $data = [
        [
            'type' => 'user',
            'path' => 'assets/images/users'
        ],
        [
            'type' => 'outlet',
            'path' => 'assets/images/outlet'
        ],
        [
            'type' => 'item',
            'path' => 'assets/images/item'
        ],
        [
            'type' => 'ingredient',
            'path' => 'assets/images/ingredient'
        ],
        [
            'type' => 'bundle',
            'path' => 'assets/images/bundle'
        ],
        [
            'type' => 'npwp',
            'path' => 'assets/images/npwp'
        ],
        [
            'type' => 'logo',
            'path' => 'assets/images/logo'
        ],
        [
            'type' => 'payment',
            'path' => 'assets/images/payment'
        ],
    ];

    $filteredArray = array_filter($data, function ($item) use ($key, $type) {
        return $item[$key] === $type;
    });

    return array_values($filteredArray)[0]['path'];
}