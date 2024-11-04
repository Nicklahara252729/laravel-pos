<?php

namespace App\Repositories\Backoffice\Ingredient\KategoriBahan;

interface KategoriBahanRepositories
{
    public function data(string $uuid_outlet);
    public function save(object $request, string $uuid_outlet);
    public function update(object $request, string $uuid_ingredient_category, string $uuid_outlet);
    public function delete(string $uuid_ingredient_category, string $uuid_outlet);
    public function get(string $uuid_ingredient_category, string $uuid_outlet);
    public function assignItem(array $request, string $uuid_ingredient_category, string $uuid_outlet);
}
