<nav class="navbar navbar-expand-lg bg-dark border-bottom border-bottom-dark ticky-top bg-body-tertiary"
data-bs-theme="dark">
<div class="container">
    <a class="navbar-brand fw-light" href="{{ route('dashboard.index') }}"><span class="fas fa-brain me-1"> </span>Ideas</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav">
            @guest
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeis('login') ? 'active' : '' }}" href="{{ route('login') }}">Logar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeis('register') ? 'active' : '' }}" href="{{ route('register') }}">Registrar</a>
                </li>
            @endguest
            @auth
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeis('profile') ? 'active' : '' }}" href="{{ route('profile') }}">{{ Auth::user()->name }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link"  href="{{ route('locale.setting','en') }}">ES</a> 
                </li>
                <li class="nav-item">
                    <a class="nav-link"  href="{{ route('locale.setting','pt-BR') }}">PT</i></a> 
                </li>
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <li class="nav-item">
                        <button type='submit' class="nav-link" >Logout</button>
                    </li>
                </form>
            @endauth
        </ul>
    </div>
</div>
</nav>