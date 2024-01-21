<?php

namespace App\Http\Controllers;


use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(string $post, Request $request)
    {
        $request['post_id'] = $post;
        $request['user_id'] =  Auth()->id();
        Comment::create($request->all());

        return redirect()->route('posts.show', $post)->with('sucess', 'Comentário postado com sucesso');
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();
        return redirect()->route('dashboard.index')->with('sucess', 'Comentário excluído com sucesso');
    }
}
