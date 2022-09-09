<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\SivaController;
use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends SivaController
{
    public function index() {

        //echo 123;exit;
        try {
            $posts = Post::all();
        
            return response()->json([
                'status' => 'success',
                'posts' => $posts,
            ], 201);
        } catch (Exception $e) {
            return $e;
        }
    }

    public function store(Request $request){

        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'age' => 'required',
            'paid' => 'required',
        ]);
         
        $file = $request->file('image');
        $timestamp = strtotime("now");
        $filename = $timestamp . '-' . $file->getClientOriginalName();
        $file->move(public_path('images/clients-img'), $filename);
        //Post::create($request->all());
    
        $post = new Post;
        $post->name = $request->name;
        $post->description = $request->description;
        $post->path = $filename;
        $post->age = $request->age;
        $post->paid = $request->paid;
        $post->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Post Created Successfully',
        ], 201);
        
    }


    public function bhuvin(){
        return response()->json([
            'message' => $this->skumarn()
        ], 201);
    }
}
