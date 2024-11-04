<?php 

namespace App\Repositories\Backoffice\Pegawai\PinAkses;

interface PinAksesRepositories
{
    public function data(string $uuid_outlet);
    public function get(string $uuid_user, string $uuid_outlet);
    public function update(array $request, string $uuid_user, string $uuid_outlet);
}