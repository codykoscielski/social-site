<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class postController extends Controller
{
    //
    public function showCreateForm() { 
        return view("create-post");
    }

    public function createPost(Request $request) {
        $incomingFields = $request->validate([
            'title' => 'required',
            'body' => 'required'
        ]);

        $incomingFields['title'] = strip_tags($incomingFields['title']);
        $incomingFields['body'] = strip_tags($incomingFields['body']);
        $incomingFields['user_id'] = auth()->id();

        $newPost = Post::create($incomingFields);
        
        return redirect("/post/{$newPost->id}")->with('success', 'Post created!');
    }

    public function viewSinglePost(Post $post) {
        $post->body = strip_tags(Str::markdown($post->body), '<p><ul>');
        return view('single-post', ['post' => $post]);
    }
}