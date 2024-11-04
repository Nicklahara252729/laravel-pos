<?php

namespace App\Repositories\Backoffice\Produk\TipePenjualan;

interface TipePenjualanRepositories
{
    public function data(string $uuid_outlet);
    public function get(string $uuid_sales_type, string $uuid_outlet);
    public function save(object $req);
    public function update(object $req, string $uuid_sales_type, string $uuid_outlet);
    public function delete(string $uuid_sales_type, string $uuid_outlet);
}
