<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\SpotPost;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class googlemapsController extends Controller
{
    //
    public function googlemapsForm(): View
    {
        return view('googlemaps.postForm');
    }

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function index()
    {
        $spots = SpotPost::select('id', 'spotTitle', 'spotDesc', 'latitude', 'longitude')->get();
        return view('dashboard', compact('spots'));
    }

    public function spotStore(Request $request): RedirectResponse
    {
        $request->validate([
            'spotTitle' => ['required', 'string', 'max:20'],
            'spotDesc' => ['nullable', 'string', 'max:255'],
        ]);

        $post = SpotPost::create([
            'user_id' => Auth::id(),
            'spotTitle' => $request->spotTitle,
            'spotDesc' => $request->spotDesc,
            'imag_url' => $request->imag_url,
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
}
