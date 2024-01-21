<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FeedController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $followingsIDs = Auth::user()->followings()->pluck('user_id');

        $posts = Post::whereIn('user_id', $followingsIDs)->latest();
        $termo = false;

        if ($request->has('search')) {
            $posts = $posts->where('content', 'like', "%$request->search%");
            $termo = $request->search;
        }

        return view('dashboard.index')
            ->with('posts', $posts->paginate(2)->withQueryString())
            ->with('termo', $termo);
    }
}
