<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Contracts\SettingContract;
use App\Http\Controllers\BaseController;
use App\Models\Setting;

/**
 * Class SettingController
 * @package App\Http\Controllers\Admin
 */
class SettingController extends BaseController
{
    /**
     * @var SettingContract
     */
    protected $settingRepository;

    /**
     * SettingController constructor.
     * @param SettingContract $settingRepository
     */
    public function __construct(SettingContract $settingRepository)
    {
        $this->settingRepository = $settingRepository;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $settings = $this->settingRepository->listSettings();
        return view('admin.settings.index', compact('settings'));
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $setting = $this->settingRepository->findSettingById($id);

        return view('admin.settings.edit', compact('setting'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request)
    {
        $this->validate($request, Setting::rules());

        $setting = $this->settingRepository->updateSetting($request);

        if (!$setting) {
            return $this->responseRedirectBack('Error occurred while updating setting.', 'error', true, true);
        }
        return $this->responseRedirect('settings.index', 'Setting updated successfully' ,'success',false, false);
    }

}
