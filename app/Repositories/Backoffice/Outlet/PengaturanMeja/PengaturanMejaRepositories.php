<?php

namespace App\Repositories\Backoffice\Outlet\PengaturanMeja;

interface PengaturanMejaRepositories
{
    public function groupMejaData();
    public function groupMejaGet(string $uuidTable);
    public function groupMejaSave(object $request);
    public function groupMejaUpdate(object $request, string $uuidOutlet);
    public function groupMejaDuplicate(string $uuidOutlet);
    public function groupMejaAturMeja(string $uuidOutlet);
    public function groupMejaDelete(object $uuidTable, string $uuidOutlet);
    public function laporanTotal();
    public function laporanData();
    public function laporanTransaksi(string $uuidTable);
    public function laporanVoid(string $uuidOutlet);
}
