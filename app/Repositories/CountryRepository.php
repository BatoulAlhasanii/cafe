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
}
