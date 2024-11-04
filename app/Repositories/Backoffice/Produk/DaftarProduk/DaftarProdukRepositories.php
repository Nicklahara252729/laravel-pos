<?php

namespace App\Repositories\Backoffice\Produk\DaftarProduk;

interface DaftarProdukRepositories
{
    public function data(string $uuid_outlet);
    public function get(String $uuidItem, string $uuid_outlet);
    public function save(array $req);
    public function update(array $req, String $uuidItem, string $uuid_outlet);
    public function delete(String $uuidItem, string $uuid_outlet);
    public function itemByKategori(string $uuidCategori);
    public function import($request);
}
