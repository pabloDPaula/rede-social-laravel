<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('admin.login');
    }

    public function authenticate(Request $request)
    {
        $messages = [
            'email.required' => 'O campo email é obrigatório.',
            'password.required' => 'O campo senha é obrigatório.',
            'email'    => 'O :attribute deve ser um email válido.'
        ];

        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ], $messages);


        #  Verifica se existe um usuario no banco com esse email e senha  E se is_admin = true 
        if (Auth::attempt($validated) and Auth::user()->is_admin) {
            $request->session()->regenerate();
            return redirect()->route('admin.dashboard');
        }

        # Se existir um usuário ele faz a autenticacao mas volta para página de admin.login
        # tentar arrumar
        return redirect()->route('admin.login')->withErrors(['login' => 'Não encontramos um usuário com esse email e senha']);
    }

    public function destroy()
    {
        Auth::logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return view('auth.login');
    }
}
