@extends('layout.dashboard')

@section('dashboard-content')
    <h4> Compartilhe seus pensamentos </h4>
    <form action="{{ route('posts.store') }}" method="post">
        @csrf
        <div class="row">
            <div class="mb-3">
                <textarea class="form-control @error('content') is-invalid @enderror" name='content' rows="3"></textarea>
                @error('content')
                    <div class="mt-3 d-block invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="">
                <button type='submit' class="btn btn-success"> Publicar </button>
            </div>
        </div>
    </form>
    <hr>
       
        @if($termo and $posts->count() > 0)
            <p>Posts encontrados com a palavra: {{ $termo  }}</p>
        @endif

        @forelse($posts as $post)
            @include('post.partials.card-post')
        @empty
            <p>Nenhum post encontrado</p>
        @endforelse
        <div class='d-flex justify-content-center'>
            {{ $posts->links() }}
        </div>

@endsection