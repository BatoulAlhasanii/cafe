<?php

namespace App\Contracts;

/**
 * Interface CityContract
 * @package App\Contracts
 */
interface CityContract
{
    /**
     * @param string $order
     * @param string $sort
     * @param array $columns
     * @return mixed
     */
    public function listCities(string $order = 'id', string $sort = 'desc', array $columns = ['*']);

    /**
     * @param int $countryId
     * @return mixed
     */
    public function listCitiesByCountry(int $countryId);

    /**
     * @param int $id
     * @return mixed
     */
    public function findCityById(int $id);

}
