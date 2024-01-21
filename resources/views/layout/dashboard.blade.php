@extends('layout.layout')
@section('title','Dashboard')

@section('content')
<div class="row">
    <div class="col-3">
        @include('dashboard.partials.left-sidebar')
    </div>
    <div class="col-6">
        @include('dashboard.partials.success')
        <div class="mt-3">
           @yield('dashboard-content')
        </div>
    </div>
    <div class="col-3">
        @include('dashboard.partials.search-bar')
       @include('dashboard.partials.follow-box')
    </div>
</div>
@endsection