<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Contracts\FlavorContract;

class FlavorController extends Controller
{
    protected $flavorRepository;

    public function __construct(FlavorContract $flavorRepository)
    {
        $this->flavorRepository = $flavorRepository;
    }

    public function show($slug)
    {
        $flavor = $this->flavorRepository->findBySlug($slug);

        return view('site.flavors.view', compact('flavor'));
    }
}
