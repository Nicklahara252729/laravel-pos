<?php

namespace App\Repositories\Backoffice\Produk\PajakProduk;

interface PajakProdukRepositories
{
    public function data(string $uuid_outlet);
    public function get(string $uuid_tax, string $uuid_outlet);
    public function update(array $req, string $uuid_tax, string $uuid_outlet);
    public function save(array $req);
    public function delete(string $uuid_tax, string $uuid_outlet);
}
