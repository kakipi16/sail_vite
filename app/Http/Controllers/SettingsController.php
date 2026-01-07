<?php

namespace App\Http\Controllers;


class SettingsController extends Controller
{
    //settingsの表示をします。
    public function settings()
    {
        return view('profile.settings');
    }
}
