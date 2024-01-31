@extends('layout.dashboard')

@section('dashboard-content')
    <h4> {{ __('dashboard.shareTitle')}} </h4>
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
                <button type='submit' class="btn btn-success"> {{ __('dashboard.publishButton') }} </button>
            </div>
        </div>
    </form>
    <hr>
       
        @if($termo and $posts->count() > 0)
            <p>{{ __('dashboard.Posts found with the word') }}: {{ $termo  }}</p>
        @endif

        @forelse($posts as $post)
            @include('post.partials.card-post')
        @empty
            <p>{{ __('dashboard.No posts found')}}</p>
        @endforelse
        <div class='d-flex justify-content-center'>
            {{ $posts->links() }}
        </div> 

@endsection