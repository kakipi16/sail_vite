<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\SpotPost;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;


class postListController extends Controller
{
    //settingsの表示をします。
    public function postList(): View
    {
        $postLists = SpotPost::all();
        $user_id = Auth::id();
        return view('googlemaps.postList',  compact('postLists', 'user_id'));
    }

    public function destroy($id)
    {
        $item = SpotPost::findOrFail($id);
        $item->delete();
        return redirect()->route('googlemaps.postList')->with('message', '投稿が削除されました。');
    }
}
