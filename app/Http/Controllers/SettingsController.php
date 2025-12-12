<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingsController extends Controller
{
    //settingsの表示をします。
    public function settings()
    {
        return view('profile.settings');
    }
}
