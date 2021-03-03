<?php

namespace App\Contracts;

/**
 * Interface RoleContract
 * @package App\Contracts
 */
interface RoleContract
{
    /**
     * @param string $order
     * @param string $sort
     * @param array $columns
     * @return mixed
     */
    public function listRoles(string $order = 'id', string $sort = 'desc', array $columns = ['*']);
}
