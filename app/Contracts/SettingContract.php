<?php

namespace App\Contracts;

interface SettingContract
{
    public function listSettings(string $order = 'id', string $sort = 'desc', array $columns = ['*']);

    public function findSettingById(int $id);

    public function updateSetting($request);
}
