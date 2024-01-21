<div class="card">
    <div class="px-3 pt-4 pb-2">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <img style="width:150px" class="me-3 avatar-sm rounded-circle"
                    src="{{ $user->getImageURL() }}" alt="{{$user->name}}">
                <div>
                    <h3 class="card-title mb-0"><a href="#"> {{ $user->name }}</a></h3>
                    <span class="fs-6 text-muted">{{ $user->email }}</span>
                </div>
            </div>
        @auth
            {{-- @if($user->id == Auth::id()) --}}
            @can('update',$user)
                <div>
                    <a href="{{ route('users.edit',$user->id) }}">Editar</a>
                </div>
            @endcan
            {{-- @endif --}}
        @endauth
        </div>
        <div class="px-2 mt-4">
            <h5 class="fs-5"> Sobre : </h5>
            <p class="fs-6 fw-light">
               {{ $user->bio }}
            </p>
            <div class="d-flex justify-content-start">
                <a href="#" class="fw-light nav-link fs-6 me-3"> <span class="fas fa-user me-1">
                    </span> {{ $user->followers->count() }} Followers </a>
                <a href="#" class="fw-light nav-link fs-6 me-3"> <span class="fas fa-brain me-1">
                    </span> {{ $user->posts->count() }} posts</a>
                <a href="#" class="fw-light nav-link fs-6"> <span class="fas fa-comment me-1">
                    </span> {{ $user->comments->count()  }} comments</a>
            </div>
            @auth
                @if(!Auth::user()->is($user))
                    <div class="mt-3">
                        @if(Auth::user()->follows($user))
                            <form action="{{ route('users.unfollow',$user->id) }}" method="post">
                                @method('delete')
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm"> unfollow </button>
                            </form>
                        @else
                            <form action="{{ route('users.follow',$user->id) }}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-primary btn-sm"> Follow </button>
                            </form>
                        @endif
                    </div>
                @endif    
            @endauth
        </div>
    </div>
</div>