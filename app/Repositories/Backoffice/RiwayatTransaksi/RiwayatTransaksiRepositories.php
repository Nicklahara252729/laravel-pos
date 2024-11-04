<?php

namespace App\Repositories\Backoffice\RiwayatTransaksi;

interface RiwayatTransaksiRepositories
{
    public function total($date);
    public function data($date, $search);
    public function get(string $uuidTransaksi, string $uuidOutlet);
    public function resendReceipt(object $request);
    public function issueRefund(object $request);
    public function item(string $uuidTransaksi, string $uuidOutlet);
}
