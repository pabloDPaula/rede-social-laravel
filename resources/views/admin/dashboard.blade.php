@extends('layout.layout')
@section('title','Admin - Dashboard')

@section('content')
<form action="{{ route('admin.logout') }}" method="post">
    @csrf
    <button type='submit' class="btn btn-dark" >Logout</button>
</form>
Admin
@endsection