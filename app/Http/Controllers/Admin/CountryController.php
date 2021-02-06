<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Contracts\CountryContract;
use App\Http\Controllers\BaseController;

class CountryController extends BaseController
{
    /**
     * @var CountryContract
     */
    protected $countryRepository;

    /**
     * CategoryController constructor.
     * @param CountryContract $countryRepository
     */
    public function __construct(CountryContract $countryRepository)
    {
        $this->countryRepository = $countryRepository;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $countries = $this->countryRepository->listCountries();

        $this->setPageTitle('countries', 'List of all countries');
        return view('admin.countries.index', compact('countries'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $this->setPageTitle('countries', 'Create Country');
        return view('admin.countries.create');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [

        ]);

        $params = $request->except('_token');

        $country = $this->countryRepository->createCountry($params);

        if (!$country) {
            return $this->responseRedirectBack('Error occurred while creating country.', 'error', true, true);
        }
        return $this->responseRedirect('admin.countries.index', 'Country added successfully' ,'success',false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $country = $this->countryRepository->findCountryById($id);

        $this->setPageTitle('countries', 'Edit Country : '.$country->name);
        return view('admin.countries.edit', compact('country'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request)
    {
        $this->validate($request, [

        ]);

        $params = $request->except('_token');

        $country = $this->countryRepository->updateCountry($params);

        if (!$country) {
            return $this->responseRedirectBack('Error occurred while updating country.', 'error', true, true);
        }
        return $this->responseRedirectBack('Country updated successfully' ,'success',false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        $country = $this->countryRepository->deleteCountry($id);

        if (!$country) {
            return $this->responseRedirectBack('Error occurred while deleting country.', 'error', true, true);
        }
        return $this->responseRedirect('admin.countries.index', 'Country deleted successfully' ,'success',false, false);
    }
}
