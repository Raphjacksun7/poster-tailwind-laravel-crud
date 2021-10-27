<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;


class PostController extends Controller
{

    /**
     * Index method return a post view 
     */
    public function index()
    {
        $posts = Post::orderByDesc('created_at')->with(['user', 'likes'])->paginate(10);
        return view('pages.post', [
            'posts' => $posts
        ]);
    }

    /**
     * Store method store data get from Request of the user
     * @method store() 
     * @param request
     */
    public function store(User $user, Request $request)
    {
        $this->validate(
            $request,
            [
                'body' => 'required'
            ]
        );

        $user->posts()->create($request->only('body'));

        return back();
    }

    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);
        $post->delete();
        return back();
    }
}
