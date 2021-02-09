<?php

namespace App\Repositories;

use App\Models\Country;
use App\Contracts\CountryContract;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Doctrine\Instantiator\Exception\InvalidArgumentException;

/**
 * Class CategoryRepository
 *
 * @package \App\Repositories
 */
class CountryRepository extends BaseRepository implements CountryContract
{

    /**
     * CategoryRepository constructor.
     * @param Country $model
     */
    public function __construct(Country $model)
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
    public function listCountries(string $order = 'id', string $sort = 'desc', array $columns = ['*'])
    {
        return Country::where('is_active', true)
                ->with('countryTranslations', function($query) {
                    $query->where('lang', app()->getLocale());
                })->get();
    }

    /**
     * @param int $id
     * @return mixed
     * @throws ModelNotFoundException
     */
    public function findCountryById(int $id)
    {
        try {
            return $this->findOneOrFail($id);

        } catch (ModelNotFoundException $e) {

            throw new ModelNotFoundException($e);
        }

    }

    /**
     * @param array $params
     * @return Country|mixed
     */
    public function createCountry(array $params)
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
    public function updateCountry(array $params)
    {

    }

    /**
     * @param $id
     * @return bool|mixed
     */
    public function deleteCountry($id)
    {
        $country = $this->findCountryById($id);

        if ($country->logo != null) {
            $this->deleteOne($country->logo);
        }

        $country->delete();

        return $country;
    }
}
