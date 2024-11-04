<?php

namespace App\Repositories\Backoffice\GeneralSettings\GeneralSettings;

interface GeneralSettingsRepositories
{
    public function data();
    public function get(string $param);
}
