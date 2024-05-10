<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    private $redirect = 'dashboard';
    public function index()
    {
        $Post = Post::all();
        return $Post;
    }
    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        // Create the new post
        $post = new Post([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        //in model the function user(){ return post->belongsTo(User::class);}
        $userId = Auth::id();
        $user = User::find($userId);
        $post->user()->associate($user);
        $post->save();

        return redirect()->route($this->redirect)->with('success', 'Post created successfully.');
    }

    //update
    public function update(Request $request, Post $post)
    {
        $post->update($request->all());
        return redirect()->route($this->redirect)->with('success', 'Post updated successfully.');
    }

    //delete
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route($this->redirect)->with('success', 'Post deleted successfully.');
    }


}
