@extends('layout.layout')
@section('title','Logar-se')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-sm-8 col-md-6">
            <form class="form mt-5" action="{{ route('login') }}" method="post">
                @csrf
                @error('login')
                    <div class="mb-3 d-block invalid-feedback text-center">{{ $message }}</div>
                @enderror
                <h3 class="text-center text-dark">Logar</h3>
                <div class="form-group">
                    <label for="email" class="text-dark">Email:</label><br>
                    <input type="email" name="email" id="email" class="form-control">
                    @error('email')
                        <div class="mt-3 d-block invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mt-3">
                    <label for="password" class="text-dark">Senha:</label><br>
                    <input type="password" name="password" id="password" class="form-control">
                    @error('password')
                        <div class="mt-3 d-block invalid-feedback">{{ $message }}</div>
                    @enderror   
                </div>
                <div class="form-group">
                    <label for="remember-me" class="text-dark"></label><br>
                    <input type="submit" name="submit" class="btn btn-dark btn-md" value="Logar">
                </div>
                <div class="text-right mt-3">
                    <a href="{{ route('register') }}" class="text-dark">Cadastre-se aqui</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
    

