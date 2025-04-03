<?php

namespace App\Http\Controllers\Backend;

use App\Models\Settings;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SettingController extends Controller
{
   public function index() {
        $settings = Settings::pluck('value', 'key')->toArray();
        return view('backend.pages.setting.index', compact('settings'));
    }

    public function update(Request $request) {
    $data = $request->except('_token');

    foreach ($data as $key => $value) {
        if ($request->hasFile($key)) {
            $file = $request->file($key);
            $imageName = time() . '-' . uniqid() . '.' . $file->getClientOriginalExtension();
            $destinationPath = 'images/settings/';

            if (!file_exists(public_path($destinationPath))) {
                mkdir(public_path($destinationPath), 0777, true);
            }

            $file->move(public_path($destinationPath), $imageName);

            $value = $destinationPath . $imageName;
        }

        Settings::updateOrCreate(['key' => $key], ['value' => $value]);
    }

    return back()->with('success', 'Settings updated successfully.');
}
}