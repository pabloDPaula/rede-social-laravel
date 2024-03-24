@extends('layout.layout')
@section('title','Cadastrar-se')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-sm-8 col-md-6">
            <form class="form mt-5" action="{{ route('register') }}" method="post">
                @csrf
                <h3 class="text-dark">Cadastre-se aqui</h3>
                <div class="form-group mt-3">
                    <label for="name" class="text-dark">Nome:</label><br>
                    <input type="name" name="name" id="name" class="form-control" value={{ old('name') }}>
                    @error('name')
                        <div class="mt-3 d-block invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mt-3">
                    <label for="email" class="text-dark">Email:</label><br>
                    <input type="email" name="email" id="email" class="form-control" value={{ old('email') }}>
                    @error('email')
                        <div class="mt-3 d-block invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mt-3">
                    <label for="password" class="text-dark">Senha:</label><br>
                    <input type="password" name="password" id="password" class="form-control" value={{ old('password') }}>
                    @error('password')
                        <div class="mt-3 d-block invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mt-3">
                    <label for="password_confirmation" class="text-dark">Confirmar senha:</label><br>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" value={{ old('password_confirmation') }}>
                    @error('password_confirmation')
                        <div class="mt-3 d-block invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mt-3">
                    <button  type="submit" name="submit"  class='btn btn-dark button w-100 p-2'>Cadastrar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
    

