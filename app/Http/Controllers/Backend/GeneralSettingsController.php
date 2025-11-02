<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\BasicSettingsUpdateRequest;
use App\Http\Requests\MailSettingsUpdateRequest;
use App\Models\GeneralSetting;
use App\Services\SettingsService;
use App\Traits\FileUploadTrait;
use Illuminate\Http\Request;

class GeneralSettingsController extends Controller
{
    use FileUploadTrait;

    public function index()
    {
        return view('admin.settings.index');
    }

    public function storeBasicSettings(BasicSettingsUpdateRequest $request)
    {
        $validatedData = $request->validated();

        foreach ($validatedData as $key => $value) {
            GeneralSetting::updateOrCreate(
                ['key' => $key],
                ['value' => $value]
            );
        }

        $settingService = app(SettingsService::class);
        $settingService->clearCachedSettings();

        $notification = array(
            'message' => 'General settings set successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function storeMailSettings(MailSettingsUpdateRequest $request)
    {
        $validatedData = $request->validated();

        foreach ($validatedData as $key => $value) {
            GeneralSetting::updateOrCreate(
                ['key' => $key],
                ['value' => $value]
            );
        }

        $settingService = app(SettingsService::class);
        $settingService->clearCachedSettings();

        $notification = array(
            'message' => 'Mail settings set successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function storeLogoSettings(Request $request)
    {
        $validatedData = $request->validate([
            'logo' => ['nullable', 'image', 'max:5048'],
            'footer_logo' => ['nullable', 'image', 'max:5048'],
            'favicon_logo' => ['nullable', 'image', 'max:5048'],
            'breadcrumb_logo' => ['nullable', 'image', 'max:5048']
        ]);

        foreach ($validatedData as $key => $value) {
            $imagePath = $this->uploadImage($request, $key);
            if (!empty($imagePath)) {
                $oldPath = config('settings.' . $key);
                $this->removeImage($oldPath);

                GeneralSetting::updateOrCreate(
                    ['key' => $key],
                    ['value' => $imagePath]
                );
            }
        }

        $settingService = app(SettingsService::class);
        $settingService->clearCachedSettings();

        $notification = array(
            'message' => 'Logo settings set successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    function storeSeoSettings(Request $request)
    {
        $validatedData = $request->validate([
            'seo_title' => ['required', 'max:255'],
            'seo_description' => ['nullable', 'max:500'],
            'seo_keywords' => ['nullable']
        ]);

        foreach ($validatedData as $key => $value) {
            GeneralSetting::updateOrCreate(
                ['key' => $key],
                ['value' => $value]
            );
        }

        $settingsService = app(SettingsService::class);
        $settingsService->clearCachedSettings();

        $notification = array(
            'message' => 'SEO settings set successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    function updatePusherSettings(Request $request)
    {
        $validatedData = $request->validate([
            'pusher_app_id' => ['required', 'max:255'],
            'pusher_app_key' => ['required', 'max:255'],
            'pusher_app_secret_key' => ['required', 'max:255'],
            'pusher_cluster' => ['required', 'max:255']
        ]);

        foreach ($validatedData as $key => $value) {
            GeneralSetting::updateOrCreate(
                ['key' => $key],
                ['value' => $value]
            );
        }

        $settingsService = app(SettingsService::class);
        $settingsService->clearCachedSettings();

        $notification = array(
            'message' => 'Pusher settings set successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
