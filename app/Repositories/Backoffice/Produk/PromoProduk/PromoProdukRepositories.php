<?php

namespace App\Repositories\Backoffice\Produk\PromoProduk;

interface PromoProdukRepositories
{
    public function data();
    public function get(String $uuidPromo);
    public function save(array $req);
    public function update(array $req, String $uuidPromo);
    public function delete(String $uuidPromo);
}
