<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FollowerController extends Controller
{
    public function follow(User $user)
    {
        $follower = Auth::user();
        $follower->followings()->attach($user->id);

        // Redireciona para a página em que estava mas com uma mensagem guardada no session
        return redirect()->back()->with('sucess', 'Seguindo com sucesso');
    }

    public function unfollow(User $user)
    {
        $follower = Auth::user();
        $follower->followings()->detach($user->id);

        return redirect()->back()->with('sucess', 'Seguindo com sucesso');
    }
}
