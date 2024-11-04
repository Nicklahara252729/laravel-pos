<?php

namespace App\Repositories\Backoffice\Pembayaran\MetodePembayaran;

interface MetodePembayaranRepositories
{
    public function paymentList();
    public function data();
    public function get(string $uuidPaymentConfiguration);
    public function save(array $request);
    public function update(array $request, string $uuidPaymentConfiguration);
    public function delete(string $uuidPaymentConfiguration);
}
