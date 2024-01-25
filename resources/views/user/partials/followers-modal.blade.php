<div class="modal fade" id="followersModal" tabindex="-1" aria-labelledby="followersModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="followersModalLabel">{{  __('user.followersModal.follow')}}</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            @forelse ( $user->followers as $follower)
                <div class="d-flex justify-content-between mb-3">
                <div class="d-flex">
                        <img class="avatar-sm rounded-circle" width="50" height="50 "src="{{  $follower->getImageURL() }}" alt="{{  $follower->name}}">
                        <div class="ms-3">
                            <span class="fs-5">{{ $follower->name }}</span><br>
                            <span class="fs-6">{{ $follower->email }}</span>
                        </div>
                    </div>
                    <div class="d-flex align-items-center">
                        @if(Auth::user()->isNot($follower))
                            @if(!Auth::user()->follows($follower))
                                <form action="{{ route('users.follow',$user->id) }}" method="post">
                                    @csrf
                                    <button class="btn btn-primary" type="submit">
                                        {{  __('user.followersModal.follow')}}
                                    </button>
                                </form> 
                            @else
                                <form action="{{ route('users.unfollow',$user->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-secondary"  type="submit">
                                        {{  __('user.followersModal.remove')}}
                                    </button>
                                </form>
                            @endif
                        @endif
                    </div>
                </div>
            @empty
                <p> {{  __("user.followersModal.You don't have any followers")}}</p>
            @endforelse
        </div>
      </div>
    </div>
  </div>