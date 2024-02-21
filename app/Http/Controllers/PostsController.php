<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Models\Posts;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PostsController extends Controller
{
    public function index()
    {
        sleep(2);
        $posts = Posts::all();

        return Inertia('Dashboard', compact('posts'));
    }

    public function create()
    {
        return Inertia('NewPost');
    }

    public function store(StorePostRequest $request)
    {
        Posts::create([
            'title' => $request->title,
            'content' => $request->content
        ]);

        return redirect()->route('dashboard');
    }

    public function edit($id)
    {
        $post = Posts::find($id);

        return Inertia('EditPost', compact('post'));
    }

    public function update($id, StorePostRequest $request)
    {
        $post = Posts::findOrFail($id);

        $post->update($request->validated());

        return redirect()->route('dashboard')->with('message', 'Post successfully edited');
    }

    public function destroy($id)
    {
        $post = Posts::findOrFail($id);
        $post->delete();
        return redirect('dashboard')->with('message', 'Post successfully deleted');
    }
}
