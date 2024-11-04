<?php

namespace App\Repositories\Backoffice\Inventory\PurchasingOrder;

interface PurchasingOrderRepositories
{
    public function data(string $uuidOutlet);
    public function save(object $request);
    public function update(object $request, string $uuidPo);
    public function reject(object $request, string $uuidPo);
    public function get(string $uuidPo, string $uuidOutlet);
    public function import($request);
    public function riwayat(string $uuidPo, string $uuidOutlet);
    public function updateProsesPesanan(object $request, string $uuidPo);
    public function hentikanPemenuhan(string $uuidPo);
}
