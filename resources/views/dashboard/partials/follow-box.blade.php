<div class="card mt-3">
    <div class="card-header pb-0 border-0">
        <h5 class="">Quem seguir</h5>
    </div>
    <div class="card-body">
        @foreach ($topUsers as $user)
            <div class="hstack gap-2 mb-3">
                <div class="avatar">
                    <a href="#!"><img class="avatar-img rounded-circle"
                            src="https://api.dicebear.com/6.x/fun-emoji/svg?seed=Mario" alt=""></a>
                </div>
                <div class="overflow-hidden">
                    <a class="h6 mb-0" href="{{ route('users.show',$user    ) }}">{{ $user->name }}</a>
                    <p class="mb-0 small text-truncate">{{ $user->followers_count }} seguidores</p>
                    <p class="mb-0 small text-truncate">{{ $user->email }}</p>
                </div>
                @if(!Auth::user()->is($user))
                    @if(!Auth::user()->follows($user))
                        <form action="{{ route('users.follow',$user->id) }}" method="post" class="ms-auto">
                            @csrf
                            <button class="btn btn-primary-soft rounded-circle icon-md " type="submit">
                                <i class="fa-solid fa-plus"> </i>
                            </button>
                        </form>
                    @else
                        <form action="{{ route('users.unfollow',$user->id) }}" method="post" class="ms-auto">
                            @csrf
                            @method('delete')
                            <button class="btn btn-primary-soft rounded-circle icon-md"  type="submit">
                                <i class="fa-solid fa-minus"> </i>
                            </button>
                        </form>
                    @endif
                @endif
            </div>
        @endforeach
        <div class="d-grid mt-3">
            <a class="btn btn-sm btn-primary-soft" href="#!">Mostrar mais</a>
        </div>
    </div>
</div>