<?php

namespace App\Repositories\Backoffice\Laporan\PenjualanProduk;

interface PenjualanProdukRepositories
{
    public function dataIncome($date);
    public function dataQuantity($date);
}
