<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Requests\PostRequest;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
class PostsController extends Controller
{

    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate(10);

        return view('index', ['posts' => $posts]);

    }


    public function show(Request $request, $id)
    {
        $post = Post::findOrFail($id);
        $user = Auth::user();
        return view('show', [
            'post' => $post,"user"=>$user
        ]);

    }

    public function create()
{
    $user = Auth::user();
    return view('create',["user"=>$user]);
}

    public function store(PostRequest $request)
    {
        $savedata = [
            'name' => $request->name,
            'subject' => $request->subject,
            'message' => $request->message,
        ];

        $post = new Post;
        $post->fill($savedata)->save();

        return redirect('/bbs')->with('poststatus', '新規投稿しました');
    }


    public function edit($comments_id)
    {
        $user = Auth::user();
        $comments = Comment::findOrFail($comments_id);
        return view('edit', [
            'comments' => $comments,"user"=>$user
        ]);
    }

}
