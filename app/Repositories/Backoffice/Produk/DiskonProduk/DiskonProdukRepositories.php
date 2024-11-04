<?php

namespace App\Repositories\Backoffice\Produk\DiskonProduk;

interface DiskonProdukRepositories
{
    public function data(String $uuid_outlet);
    public function get(String $uuidDiscount, string $uuid_outlet);
    public function save(array $req);
    public function update(array $req, String $uuidDiscount, string $uuid_outlet);
    public function delete(String $uuidDiscount, string $uuid_outlet);
}
