<?php

namespace App\Repositories;

use App\Models\City;
use App\Models\CityTranslation;
use App\Contracts\CityContract;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Doctrine\Instantiator\Exception\InvalidArgumentException;

/**
 * Class CategoryRepository
 *
 * @package \App\Repositories
 */
class CityRepository extends BaseRepository implements CityContract
{

    /**
     * CategoryRepository constructor.
     * @param City $model
     */
    public function __construct(City $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }

    /**
     * @param string $order
     * @param string $sort
     * @param array $columns
     * @return mixed
     */
    public function listCities(string $order = 'id', string $sort = 'desc', array $columns = ['*'])
    {
        return $this->all($columns, $order, $sort);
    }

    public function listCitiesByCountry($countryId)
    {
        return CityTranslation::where('lang', app()->getLocale())
                ->whereHas('city', function ($q) use ($countryId) {
                    $q->where(['country_id' => $countryId, 'is_active' => true]);
                  })
                  ->with('city')
                  ->orderBy('name', 'ASC')->get();
    }

    /**
     * @param int $id
     * @return mixed
     * @throws ModelNotFoundException
     */
    public function findCityById(int $id)
    {
        try {
            return $this->findOneOrFail($id);

        } catch (ModelNotFoundException $e) {

            throw new ModelNotFoundException($e);
        }

    }

    /**
     * @param array $params
     * @return City|mixed
     */
    public function createCity(array $params)
    {
        try {


        } catch (QueryException $exception) {
            throw new InvalidArgumentException($exception->getMessage());
        }
    }

    /**
     * @param array $params
     * @return mixed
     */
    public function updateCity(array $params)
    {

    }

    /**
     * @param $id
     * @return bool|mixed
     */
    public function deleteCity($id)
    {
        $city = $this->findCityById($id);

        if ($city->logo != null) {
            $this->deleteOne($city->logo);
        }

        $city->delete();

        return $city;
    }
}
