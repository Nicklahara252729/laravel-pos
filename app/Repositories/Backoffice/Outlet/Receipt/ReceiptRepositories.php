<?php

namespace App\Repositories\Backoffice\Outlet\Receipt;

interface ReceiptRepositories
{
    public function preview(string $uuidOutlet);
    public function update(object $request, string $uuidOutlet);
}
