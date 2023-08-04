<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Requests\PostsCreateRequest;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Photo;


class AdminPostsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();

        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostsCreateRequest $request)
    {
        $input = $request->all();
        $user = Auth::user();

        if($file = $request->file('photo_id')) {

        // moving the file and also checking to see if the file is available
        $name = time() . $file->getClientOriginalName();
        
        $file->move('images', $name);
        
        $photo = Photo::create(['file'=>$name]);
        
        $input['photo_id'] = $photo->id;
        }

        $user->posts()->create($input);
        return redirect('/admin/posts');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
