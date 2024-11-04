<?php

namespace App\Repositories\Backoffice\Pegawai\Akses;

interface AksesRepositories
{
    public function data(string $uuidOutlet);
    public function save(array $req);
    public function update(array $req, string $uuid_access, string $uuid_outlet);
    public function get(string $uuid_access, string $uuid_outlet);
    public function delete(string $uuid_access, string $uuid_outlet);
}
