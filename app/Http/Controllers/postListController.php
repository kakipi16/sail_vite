<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\SpotPost;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;


class PostListController extends Controller
{
    //settingsの表示をします。
    public function postList(): View
    {
        // OK: with() で事前にユーザー情報をまとめて取得する
        $postLists = SpotPost::with('user')->get();
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
