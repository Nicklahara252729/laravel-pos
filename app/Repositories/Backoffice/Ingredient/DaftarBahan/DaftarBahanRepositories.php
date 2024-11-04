<?php

namespace App\Repositories\Backoffice\Ingredient\DaftarBahan;

interface DaftarBahanRepositories
{
    public function data(string $uuid_outlet);
    public function save(object $request, string $uuid_outlet);
    public function update(object $request, string $uuidIngredientLibrary, string $uuid_outlet);
    public function delete(string $uuidIngredientLibrary, string $uuid_outlet);
    public function get(string $uuidIngredientLibrary, string $uuid_outlet);
    public function importReplace($request);
    public function importChange($request);
}
