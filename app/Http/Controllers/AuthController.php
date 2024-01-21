<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $messages = [
            'name.required' => 'O campo nome é obrigatório.',
            'email.required' => 'O campo email é obrigatório.',
            'password.required' => 'O campo senha é obrigatório.',
            'email'    => 'O :attribute deve ser um email válido.',
            'confirmed' => 'Os campos senha e confirmar senha devem ser iguais',
            'name.min' => 'O campo nome deve ter no mínimo :min caracteres',
            'name.max' => 'O campo noome deve ter no máximo :max caracteres'
        ];

        $validated = $request->validate(
            [
                'name' => 'required|min:3|max:40',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|confirmed'
            ],
            $messages
        );


        $validated['password'] = Hash::make($validated['password']);

        User::create($validated);

        return redirect()->route('dashboard.index')->with('sucess', 'Conta criada com sucesso');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function destroy()
    {
        Auth()->logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {

        $messages = [
            'email.required' => 'O campo email é obrigatório.',
            'password.required' => 'O campo senha é obrigatório.',
            'email'    => 'O :attribute deve ser um email válido.'
        ];

        $validated = $request->validate(
            [
                'email' => 'required|email',
                'password' => 'required'
            ],
            $messages
        );

        if (auth()->attempt($validated)) {
            $request->session()->regenerate();

            return redirect()->route('dashboard.index')->with('sucess', 'Conta logada com sucesso');
        }

        return redirect()->route('login')->withErrors(['login' => 'Não encontramos nenhum usuário com esse email e senha']);
    }
}
