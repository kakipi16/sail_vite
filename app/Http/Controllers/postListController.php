<?php

namespace App\Http\Controllers;

use App\Models\SpotPost;


class postListController extends Controller
{
    //settingsの表示をします。
    public function postList()
    {
        $postLists = SpotPost::all();
        return view('googlemaps.postList',  compact('postLists'));
    }
}
