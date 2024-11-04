<?php

namespace App\Repositories\Backoffice\Pegawai\DaftarPegawai;

interface DaftarPegawaiRepositories
{
    public function data(string $status, string $uuid_outlet);
    public function get(string $uuid_user, string $uuid_outlet);
    public function update(array $req, string $uuid_user, string $uuid_outlet);
    public function restore(string $uuid_user, string $uuid_outlet);
    public function save(array $req);
    public function delete(string $uuid_user, string $uuid_outlet);
    public function deletePermanent(string $uuid_user, string $uuid_outlet);
    public function import($request);
}
