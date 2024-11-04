<?php

namespace App\Repositories\Backoffice\Pembayaran\CheckoutSetting;

interface CheckoutSettingRepositories
{
    public function get(string $uuidOutlet);
    public function update(array $request, string $uuidOutlet);
}
