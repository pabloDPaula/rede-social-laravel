<div class="card">
    <div class="px-3 pt-4 pb-2">
            <form action="{{ route('users.update',$user->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center">
                        <img style="width:150px" class="me-3 avatar-sm rounded-circle"
                            src="{{ $user->getImageURL() }}" alt="{{$user->name}}">
                        <div>
                            <input value={{ $user->name }} name='name' type="text" class="form-control">
                            @error('name')
                                <div class="mt-3 d-block invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    @auth
                        @if($user->id == Auth::id())
                            <div>
                                <a href="{{ route('users.show',$user->id) }}">Exibir</a>
                            </div>
                        @endif
                    @endauth
                </div>
                <div class="mt-4">
                    <label for="image" class="mb-2">Foto do perfil</label>
                    <input type="file" name="image" id='image' class="form-control">
                    @error('image')
                        <div class="mt-3 d-block invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="px-2 mt-4">
                    <h5 class="fs-5"> About : </h5>
                        <div class="mb-3">
                            <textarea class="form-control @error('content') is-invalid @enderror" name='bio' rows="3">{{ $user->bio }}</textarea>
                            @error('bio')
                                <div class="mt-3 d-block invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <button class="btn btn-dark btn-sm mb-3">Salvar</button>
                    <div class="d-flex justify-content-start">
                        <a href="#" class="fw-light nav-link fs-6 me-3"> <span class="fas fa-user me-1">
                            </span> 0 Followers </a>
                        <a href="#" class="fw-light nav-link fs-6 me-3"> <span class="fas fa-brain me-1">
                            </span> {{ count($user->posts) }} posts</a>
                        <a href="#" class="fw-light nav-link fs-6"> <span class="fas fa-comment me-1">
                            </span> {{ count($user->comments) }} comments</a>
                    </div>
                    @auth
                        @if($user->id != Auth::id())
                            <div class="mt-3">
                                <button class="btn btn-primary btn-sm"> Follow </button>
                            </div>
                        @endif    
                    @endauth
                </div>
            </form>
    </div>
</div>