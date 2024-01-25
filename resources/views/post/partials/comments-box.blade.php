<form action="{{ route('posts.comments.store',$post->id) }}" method="post">
    @csrf
    <div class="mb-3">
        <textarea class="fs-6 form-control" name='content' rows="1"></textarea>
        @error('content')
            <div class="mt-3 d-block invalid-feedback">{{ $message }}</div>
        @enderror 
    </div>
    <div>
        <button class="btn btn-primary btn-sm" type='submit'>{{__('comments.commentButton')}} </button>
    </div>
    <hr>
</form>
@forelse($post->comments as $comment)
    <div class="d-flex align-items-start">
        <img style="width:35px" class="me-2 avatar-sm rounded-circle"
            src="{{ $comment->user->getImageURL()  }}"
            alt="{{ $comment->user->name }}">
        <div class="w-100">
            <div class="d-flex justify-content-between">
                <h6 class="">{{ $comment->user->name }}
                </h6>
                <small class="fs-6 fw-light text-muted"> {{  $comment->created_at->diffforhumans() }} </small>
            </div>
            <div class="d-flex justify-content-between">
                <p class="fs-6 mt-3 fw-light">
                    {{$comment->content}}
                </p>
                @if($comment->user->id == Auth()->id())
                    <form action="{{ route('comments.delete',$comment->id) }}" method="post">
                        @method('delete')
                        @csrf
                        <button class="btn btn-link">{{ __('comments.deleteButton')}}</button>
                    </form>
                @endif
            </div>
        </div>
    </div>
@empty
    <p class="text-center">{{ __('comments.No comments found, be the first') }}</p>
@endforelse
