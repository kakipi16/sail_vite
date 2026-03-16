<?php

namespace App\Http\Controllers;

use App\Models\SpotPost;
use Illuminate\Http\Request;

class ApiLocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $spotPosts = SpotPost::with('user')->get();
        return response()-> json([
            'status' => true,
            'spotPosts' => $spotPosts
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    //ここのリクエストを調べる 
    // use App\Http\Requests\StoreBlogRequest;
    // StoreBlogRequestとは？
    public function store(Request $request)
    {
        //ディレクトリ名
        $dir = 'img';
        // storage/app/public/img に保存され、URLアクセス可能になる
        $path = $request->file('image')->store($dir, 'public');

        $spotPost = SpotPost::create([
            'user_id' => Auth::id(),
            'spotTitle' => $request->spotTitle,
            'spotDesc' => $request->spotDesc,
            'imag_url' => $path,
            'latitude' => $request->lat,
            'longitude' => $request->lng,
        ]);
        return response()->json([
            'status'=> true,
            'message' =>'spot Created successfully!',
            'spotPost'=> $spotPost
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
          $spotPosts = SpotPost::find($id);
        if($spotPosts){
            return response()->json([
                'message'=> 'Blog found',
                'data' => $spotPosts
            ], 200);
        } else {
            return response()->json([
                'message'=> 'Blog not found',
            ], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $update = [
            'spotTitle' => $request->spotTitle,
            'spotDesc' => $request->spotDesc
        ];
        $spotPost =  SpotPost::where('id', $id)->update($update);
        $spotPosts = SpotPost::all();
        if ($spotPost) {
            return response()->json([
                'message'=> 'Blog update',
                'data' => $spotPosts
            ], 200);
        } else {
            return response()->json([
                'message' => 'Blog not found',
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $spotPost = SpotPost::where('id', $id)->delete();
        if ($spotPost) {
            return response()->json([
                'message' => 'Blog deleted successfully',
            ], 200);
        } else {
            return response()->json([
                'message' => 'Blog not found',
            ], 404);
        }
    }
}
