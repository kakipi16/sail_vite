<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\SpotPost;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class GoogleMapsController extends Controller
{
    //
    public function googlemapsForm(): View
    {
        return view('googlemaps.postForm');
    }
    public function index()
    {
        $user = auth()->user();
        $user->tokens()->delete();
        $token = $user->createToken('map-api-token')->plainTextToken;

        $spots = SpotPost::with('user')->get();
        return view('dashboard', [
            'spots'          => $spots,
            'mapsApiKey'     => config('services.google.maps_api_key'),
            'mapsId'         => config('services.google.maps_id'),
            'apiToken' => $token,
        ]);
    }
    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function spotStore(Request $request): RedirectResponse
    {
        //バリレーション
        $request->validate([
            'spotTitle' => ['required', 'string', 'max:20'],
            'spotDesc'  => ['nullable', 'string', 'max:255'],
            'image'     => ['required', 'image'],
            'lat'       => ['required', 'numeric', 'between:-90,90'],
            'lng'       => ['required', 'numeric', 'between:-180,180'],
        ]);
        // ディレクトリ名
        $dir = 'img';
        // storage/app/public/img に保存され、URLアクセス可能になる
        $path = $request->file('image')->store($dir, 'public');

        $post = SpotPost::create([
            'user_id' => Auth::id(),
            'spotTitle' => $request->spotTitle,
            'spotDesc' => $request->spotDesc,
            'imag_url' => $path,
            'latitude' => $request->lat,
            'longitude' => $request->lng,
        ]);

        return redirect(route('dashboard', absolute: false));
    }

    public function show(SpotPost $spotPost): View
    {
        return view('googlemaps.show', [
            'spotPost' => $spotPost
        ]);
    }

    public function edit(SpotPost $spotPost)
    {
        if ($spotPost->user_id !== Auth::id()) {
            abort(403);
        }
        return view('googlemaps.edit', compact('spotPost'));
    }
    

    public function update(Request $request, SpotPost $spotPost): RedirectResponse
    {
        if ($spotPost->user_id !== Auth::id()) {
            abort(403);
        }
        $validated = $request->validate([
            'spotTitle' => ['nullable', 'string', 'max:20'],
            'spotDesc' => ['nullable', 'string', 'max:255'],
            'image' => ['nullable', 'image'],
        ]);

        // 入力があった項目だけを取り出す（nullを除外）
        $updateData = array_filter($validated, fn($v) => !is_null($v));

        // 画像がある場合のみ処理
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('img', 'public');
            $updateData['imag_url'] = $path;
        }

        $spotPost->update($updateData);

        return redirect('postList');
    }


    public function destroy(Request $request, SpotPost $spotPost)
    {
        if ($spotPost->user_id !== Auth::id()) {
            abort(403);
        }
        $spotPost->delete();
        $request->session()->flash('message', '投稿を削除しました');
        return back();
    }
}
