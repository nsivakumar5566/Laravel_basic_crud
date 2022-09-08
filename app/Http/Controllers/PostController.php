<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use File;

class PostController extends Controller
{
    public function index() {
        $posts = Post::all();
        return view('postview.index',compact('posts'))->with('i');
    }

    public function create(){
        return view('postview.create');
    }

    public function store(Request $request){

        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'age' => 'required',
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
        $post->save();

        return redirect()->route('postindex')
            ->with('success', 'Post created successfully.');
     
           
            
    }

    public function view($id){
        $viewpost = Post::find($id);
        return view('postview.show', compact('viewpost'));
    }
    public function edit($id){
        $editpost = Post::find($id);
        return view('postview.edit', compact('editpost'));
    }

    public function update(Request $request, $id , $path){

        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'sometimes|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'age' => 'required',
        ]);

        if ($request->image) {
            unlink("images/clients-img/".$path);
            $file = $request->file('image');
            $timestamp = strtotime("now");
            $filename = $timestamp . '-' . $file->getClientOriginalName();
            $file->move(public_path('images/clients-img'), $filename);
        }

        // Post::create($request->all());

        $post = Post::find($id);
        $post->name = $request->name;
        $post->description = $request->description;
        $post->age = $request->age;
        if ($request->image) {
            $post->path = $filename;
        }
        $post->save();

        return redirect()->route('postindex')
            ->with('success', 'Post updated successfully.');
    }
   
    public function destroy($id ,$imagepath){

        $filePath = public_path('images/clients-img/' . $imagepath);
        if (!File::isDirectory($filePath)) {
            unlink("images/clients-img/" . $imagepath);
        }
        $post = Post::find($id);
        $post->delete();

        return redirect()->route('postindex')
            ->with('success', 'Post deleted successfully.');
    }
}
