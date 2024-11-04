<?php

namespace App\Repositories\Backoffice\Profile\DaftarOutlet;

interface DaftarOutletRepositories
{
    public function data();
    public function get(string $uuid_outlet);
    public function update(object $request, string $uuid_outlet);
    public function save(object $req);
    public function delete(string $uuid_outlet);
}
