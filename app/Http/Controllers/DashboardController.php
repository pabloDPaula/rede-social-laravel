<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $posts = Post::withCount('likes')->orderby('created_at', 'DESC');
        $termo = false;

        if ($request->has('search')) {
            $posts = $posts->search($request->search);
            $termo = $request->search;
        }
        return view('dashboard.index')
            ->with('posts', $posts->paginate(4)->withQueryString())
            ->with('termo', $termo);
    }
}
