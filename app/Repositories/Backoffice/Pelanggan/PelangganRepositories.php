<?php

namespace App\Repositories\Backoffice\Pelanggan;

interface PelangganRepositories
{
    public function data(string $uuidOutlet);
    public function import($request);
    public function get(string $uuidPelanggan);
    public function receipt(string $uuidTransaksi, string $uuidOutlet);
    public function transaksi(string $uuidPelanggan);
    public function search(string $nama, string $uuidOutlet);
}
