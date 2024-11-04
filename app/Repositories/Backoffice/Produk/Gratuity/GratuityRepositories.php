<?php

namespace App\Repositories\Backoffice\Produk\Gratuity;

interface GratuityRepositories
{
    public function data(String $uuid_outlet);
    public function get(String $uuid_gratuity, string $uuid_outlet);
    public function save(array $req);
    public function update(array $req, String $uuid_gratuity, string $uuid_outlet);
    public function delete(String $uuid_gratuity, string $uuid_outlet);
}
