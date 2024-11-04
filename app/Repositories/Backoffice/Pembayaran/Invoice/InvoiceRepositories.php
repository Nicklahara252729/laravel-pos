<?php

namespace App\Repositories\Backoffice\Pembayaran\Invoice;

interface InvoiceRepositories
{
    public function data();
    public function get(string $uuidInvoice, string $uuidOutlet);
    public function update(object $request, string $uuidInvoice, string $uuidOutlet);
    public function resend(string $uuidInvoice);
    public function cancel(object $requset, string $uuidInvoice, string $uuidOutlet);
}
