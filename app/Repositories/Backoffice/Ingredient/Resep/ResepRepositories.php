<?php

namespace App\Repositories\Backoffice\Ingredient\Resep;

interface ResepRepositories
{
    public function dataProduk(string $uuidOutlet);
    public function dataHalfRaw(string $uuidOutlet);
    public function save(object $request);
    public function update(object $request, string $uuidRecipe);
    public function delete(string $uuidRecipe);
    public function get(string $uuidRecipe);
    public function import($request);
}
