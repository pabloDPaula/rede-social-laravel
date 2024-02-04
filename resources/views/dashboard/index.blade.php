@extends('layout.dashboard')

@section('dashboard-content')
    <!-- <h4> {{ __('dashboard.shareTitle')}} </h4> -->
    <form action="{{ route('posts.store') }}" method="post"  enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="row mb-3">
                <div class='col-1 d-flex align-items-center'>
                    <img class="avatar-sm rounded-circle" width="45" height="auto "src="{{ Auth::user()->getImageURL() }}" alt="{{ Auth::user()->name}}"/>
                </div>
                <div class='col-11'>
                    <textarea class="form-control rounded @error('content') is-invalid @enderror" name='content' rows="2" placeholder="No que está pensando?" style='resize: none;'></textarea>
                    @error('content')
                        <div class="mt-3 d-block invalid-feedback">{{ $message }}</div>
                    @enderror
                    @error('media')
                        <div class="mt-3 d-block invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div id="preview"></div> 
            </div>
            <div class="row">
                <div class="col-6"><input class="btn btn-success form-control" type="file" multiple id='media_path' name="media_path[]"> </button></div>
                <div class="col-6"><button type='submit' class="btn btn-success w-100"> {{ __('dashboard.publishButton') }} </button></div>
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