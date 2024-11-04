<?php

namespace App\Repositories\Backoffice\Produk\KategoriProduk;

interface KategoriProdukRepositories
{
    public function data(string $uuid_outlet,$search);
    public function get(string $uuid_kategori_produk, string $uuid_outlet);
    public function save(array $request);
    public function update(array $request, string $uuid_kategori_produk, string $uuid_outlet);
    public function delete(string $uuid_kategori_produk, string $uuid_outlet);
    public function assignItem(array $request, string $uuid_kategori_produk, string $uuid_outlet);
}
