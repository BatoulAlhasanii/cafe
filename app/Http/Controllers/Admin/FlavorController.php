<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Contracts\FlavorContract;
use App\Http\Controllers\BaseController;
use App\Models\Flavor;

class FlavorController extends BaseController
{
    /**
     * @var FlavorContract
     */
    protected $flavorRepository;

    /**
     * FlavorController constructor.
     * @param FlavorContract $flavorRepository
     */
    public function __construct(FlavorContract $flavorRepository)
    {
        $this->flavorRepository = $flavorRepository;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $flavors = $this->flavorRepository->listFlavors();
        return view('admin.flavors.index', compact('flavors'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {

        return view('admin.flavors.create');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, Flavor::rules());

        $flavor = $this->flavorRepository->createFlavor($request);

        if (!$flavor) {
            return $this->responseRedirectBack('Error occurred while creating flavor.', 'error', true, true);
        }
        return $this->responseRedirect('flavors.index', 'Flavor added successfully' ,'success',false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $flavor = $this->flavorRepository->findFlavorById($id);

        return view('admin.flavors.edit', compact('flavor'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request)
    {
        $this->validate($request, Flavor::rules());

        $flavor = $this->flavorRepository->updateFlavor($request);

        if (!$flavor) {
            return $this->responseRedirectBack('Error occurred while updating flavor.', 'error', true, true);
        }
        return $this->responseRedirect('flavors.index', 'Flavor updated successfully' ,'success',false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        $flavor = $this->flavorRepository->deleteFlavor($id);

        if (!$flavor) {
            return $this->responseRedirectBack('Error occurred while deleting flavor.', 'error', true, true);
        }
        return $this->responseRedirect('admin.flavors.index', 'Flavor deleted successfully' ,'success',false, false);
    }
}
