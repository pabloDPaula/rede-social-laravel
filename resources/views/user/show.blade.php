@extends('layout.layout')
@section('title','Perfil')

@section('content')
<div class="row">
    <div class="col-3">
        @include('dashboard.partials.left-sidebar')
    </div> 
    <div class="col-6">
        @include('dashboard.partials.success')
        <div class="mt-3">
            @include('user.partials.user-card')
        </div>
        <hr>

        @if($posts->count() == 0)
            <p>Nenhum post encontrado</p>
        @else
            @foreach ($posts as $post)
                @include('post.partials.card-post')
            @endforeach
            <div class='d-flex justify-content-center'>
                {{ $posts->links() }}
            </div>
        @endif

    </div>
    <div class="col-3">
        @include('dashboard.partials.search-bar')
       @include('dashboard.partials.follow-box')
    </div>
</div>
@endsection