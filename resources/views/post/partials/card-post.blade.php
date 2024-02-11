<div class="card mb-5">
    <div class="px-3 pt-4 pb-2">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <img style="width:50px" class="me-2 avatar-sm rounded-circle"
                    src="{{ $post->user->getImageURL() }}" alt="{{ $post->user->name }}">
                <div>
                    <h5 class="card-title mb-0"><a href="{{ route('users.show',$post->user->id) }}"> {{ $post->user->name }}
                        </a></h5>
                </div>
            </div>
        {{-- @if($post->user_id == Auth::id()) --}}
            @can('update',$post)
                <div class="d-flex align-items-center ">
                    <form action="{{ route('posts.delete',$post->id) }}" method="POST">
                        @method('delete')
                        @csrf
                        <a href="{{ route('posts.show',$post->id) }}" class='btn btn-warning btn-sm'><i class="fa-solid fa-eye"></i></a>
                        <a href="{{ route('posts.edit',$post->id) }}" class='btn btn-info btn-sm  ms-2'><i class="fa-solid fa-pencil"></i></a>
                        <button class='btn btn-danger btn-sm ms-2'><i class="fa-solid fa-trash"></i></button>
                    </form>
                </div>
            {{-- @endif --}}
            @endcan
        </div>
    </div>
    <div class="card-body">
        <p class="fs-6 fw-light text-muted">
            @if($editing ?? false )
                @can('update',$post)
                    <form action="{{ route('posts.update',$post->id) }}" enctype="multipart/form-data" method="post">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="mb-3">
                                <textarea class="form-control @error('content') is-invalid @enderror" name='content' id="content" rows="3">{{$post->content}}</textarea>
                                @error('content')
                                    <div class="mt-3 d-block invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="row">
                                <div class="col-6"> <input class="btn btn-success form-control" type="file" multiple id='media_path' name="media_path[]"></div>
                                <div class="col-6"> <button type='submit' class="btn btn-success"> Atualizar </button></div>
                            </div>
                            <div class="row">
                                @error('media_path')
                                    <div class="mt-3 d-block invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </form>
                    <div class='mt-3' id="preview"></div> 
                    @if($post->media)
                        <div class='row mt-4'> 
                            @foreach ($post->media as $image)
                                <div class='col-4'>
                                    <form method="post" action="{{ route('media.delete',[$post->id, $image]) }}">
                                        @csrf
                                        @method('delete')
                                        <img width='100%' height='auto' src="{{ $post->getImageURL($image) }}" >
                                        <span class='remove-image' style='margin: 10px -40px; position: absolute;'><button class='btn btn-danger'>X</button></span>
                                    </form>
                                </div>
                            @endforeach
                        </div>
                    @endif
                @endcan
            @else
                <div>{{ $post->content }}</div>
                @if($post->media)
                    <div> 
                        @foreach ($post->media as $image)
                            <img style="width:150px; height: auto;" src="{{ $post->getImageURL($image) }}" >
                        @endforeach
                    </div>
                @endif
            @endif
        </p>
        <div class="d-flex justify-content-between">
            <div>
                @if (Auth::user()->likePost($post))
                    <form action="{{ route('users.unlike',$post->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="fw-light nav-link fs-6"> 
                            <span class="fas fa-heart me-1">
                            </span>
                            {{  $post->likes_count }} 
                        </button>
                    </form>
                @else
                    <form action="{{ route('users.like',$post->id) }}" method="post">
                        @csrf
                        <button type="submit" class="fw-light nav-link fs-6"> 
                            <span class="far fa-heart me-1">
                            </span>
                            {{  $post->likes_count }} 
                        </button>
                    </form>
                @endif
            </div>
            <div>
                <span class="fs-6 fw-light text-muted"> <span class="fas fa-clock"> </span>
                {{  $post->created_at->diffforhumans() }} </span>
            </div>
        </div>
        <div>
            @include('post.partials.comments-box')
        </div>
    </div>
</div>