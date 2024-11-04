<?php

namespace App\Repositories\Backoffice\Produk\Modifier\ModifierItem;

interface ModifierItemRepositories
{
    public function data(string $uuidModifier, string $uuid_outlet);
    public function get(String $uuidModifierItem, string $uuid_outlet);
    public function save(array $req);
    public function update(array $req, String $uuidModifierItem, string $uuid_outlet);
    public function delete(String $uuidModifierItem, string $uuid_outlet);
}
