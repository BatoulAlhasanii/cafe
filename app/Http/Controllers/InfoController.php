<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InfoController extends Controller
{
    public function aboutUs() {
        return view('site.info.about_us');
    }

    public function deliveryPolicy() {
        return view('site.info.delivery_policy');
    }

    public function history() {
        return view('site.info.history');
    }

    public function privacyPolicy() {
        return view('site.info.privacy_policy');
    }

    public function returnPolicy() {
        return view('site.info.return_policy');
    }

    public function termsOfService() {
        return view('site.info.terms_of_service');
    }
}
