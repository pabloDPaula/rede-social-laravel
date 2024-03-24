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
                <h3 class="text-dark mb-4">Logar</h3>
                <div class="form-group">
                    <label for="email" class="text-dark">Email:</label><br>
                    <input type="email" name="email" id="email" class="form-control" placeholder="Digite seu e-mail">
                    @error('email')
                        <div class="mt-3 d-block invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mt-3">
                    <label for="password" class="text-dark">Senha:</label><br>
                    <input type="password" name="password" id="password" class="form-control" placeholder="digite sua senha">
                    @error('password')
                        <div class="mt-3 d-block invalid-feedback">{{ $message }}</div>
                    @enderror   
                </div>
                <div class="form-check mt-3">
                    <input class="form-check-input" type="checkbox" id="remember_token" name="remember_token">
                    <label class="form-check-label" for="remember_token">
                      Lembre-se de mim
                    </label>
                </div>
                <div class="form-group mt-4">
                    <button  type="submit" name="submit"  class='btn btn-dark button w-100 p-2'>Logar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
    

