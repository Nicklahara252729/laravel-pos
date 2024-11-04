<?php

namespace App\Repositories\Backoffice\Produk\PaketBundle;

interface PaketBundleRepositories
{
    public function data();
    public function get(string $uuidBundlePackage);
    public function save(array $req);
    public function update(array $req, string $uuidBundlePackage);
    public function delete(string $uuidBundlePackage);
}
