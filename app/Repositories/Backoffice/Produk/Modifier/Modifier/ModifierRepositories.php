<?php

namespace App\Repositories\Backoffice\Produk\Modifier\Modifier;

interface ModifierRepositories
{
    public function data(String $uuid_outlet);
    public function get(String $uuidModifier, string $uuid_outlet);
    public function save(array $req);
    public function update(array $req, String $uuidModifier, string $uuid_outlet);
    public function delete(String $uuidModifier, string $uuid_outlet);
}
