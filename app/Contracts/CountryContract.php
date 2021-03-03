<?php

namespace App\Contracts;

/**
 * Interface CountryContract
 * @package App\Contracts
 */
interface CountryContract
{
    /**
     * @param string $order
     * @param string $sort
     * @param array $columns
     * @return mixed
     */
    public function listCountries(string $order = 'id', string $sort = 'desc', array $columns = ['*']);

}
