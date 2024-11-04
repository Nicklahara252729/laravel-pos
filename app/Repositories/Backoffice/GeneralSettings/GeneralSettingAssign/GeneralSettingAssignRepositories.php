<?php

namespace App\Repositories\Backoffice\GeneralSettings\GeneralSettingAssign;

interface GeneralSettingAssignRepositories
{
    public function data(string $uuid_outlet);
    public function get(string $uuid_outlet, string $uuid_general_setting);
    public function update(object $request, string $uuid_general_setting_assign, string $uuid_outlet);
}
