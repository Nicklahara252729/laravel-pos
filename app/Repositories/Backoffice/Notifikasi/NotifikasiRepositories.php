<?php

namespace App\Repositories\Backoffice\Notifikasi;

interface NotifikasiRepositories
{
    public function current();
    public function data($date);
}
