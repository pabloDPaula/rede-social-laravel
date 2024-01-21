<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostLikeController extends Controller
{
    public function like(Post $post)
    {
        $liker = Auth::user();
        $liker->likes()->attach($post->id);

        return redirect()->back()->with('sucess', 'Like adiciona com sucesso');
    }

    public function unlike(Post $post)
    {
        $liker = Auth::user();
        $liker->likes()->detach($post->id);

        return redirect()->back()->with('sucess', 'Like removido com sucesso');
    }
}
