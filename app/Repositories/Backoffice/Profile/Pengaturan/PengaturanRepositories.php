<?php

namespace App\Repositories\Backoffice\Profile\Pengaturan;

interface PengaturanRepositories
{
    public function get();
    public function updateSistem(object $request);
    public function updateInfoBisnis(object $request);
    public function updateNpwp(object $request);
}
