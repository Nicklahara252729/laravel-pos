<?php

namespace App\Repositories\Backoffice\Produk\Modifier\ModifierIngredient;

interface ModifierIngredientRepositories
{
    public function data(string $uuidModifier, string $uuid_outlet);
    public function get(String $uuidModifierIngredient, string $uuid_outlet);
    public function save(array $req);
    public function update(array $req, String $uuidModifierIngredient, string $uuid_outlet);
    public function delete(String $uuidModifierIngredient, string $uuid_outlet);
}
