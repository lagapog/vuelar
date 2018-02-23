@if(Auth::check())
    @if(Auth::user()->isFollowing($user))
        <form action="{{ '/'.$user->username.'/unfollow' }}" method="post" class="mb-3 text-center">
            @csrf
            <button class="btn btn-outline-secondary">Unfollow</button>
        </form>
    @else
        <form action="{{ '/'.$user->username.'/follow' }}" method="post" class="mb-3 text-center">
            @csrf
            <button class="btn btn-outline-primary">Follow</button>
        </form>
    @endif
@endif