<nav class="navbar navbar-expand-lg bg-dark border-bottom border-bottom-dark ticky-top bg-body-tertiary"
data-bs-theme="dark">
<div class="container">
    <a class="navbar-brand fw-light" href="{{ route('dashboard.index') }}"><span class="fas fa-brain me-1"> </span>Ideas</a>
    @include('dashboard.partials.search-bar')
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
                    <a class="nav-link {{ request()->routeis('profile') ? 'active' : '' }}" href="{{ route('profile') }}"> 
                        <img class="avatar-sm rounded-circle" width="24" height="24 "src="{{ Auth::user()->getImageURL() }}" alt="{{ Auth::user()->name}}"> <span class="text-light">Perfil</span>
                    </a>
                </li>
                <li class="nav-item">
                    <div class="dropdown">
                        <button class="btn dropdown-toggle" type="button" id="dropdownButton" data-bs-toggle="dropdown" >
                            {{ session()->get('locale') == 'en' ? 'ES' : 'PT' }}
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownButton">
                            <li><a href="{{ route('locale.setting','pt-BR') }}" class="dropdown-item"> PT</a></li>
                            <li><a href="{{ route('locale.setting','en') }}" class="dropdown-item">  ES</a></li>
                        </ul>
                    </div>

   
                </li>
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <li class="nav-item">
                
                        <button type='submit' class="nav-link text-light" ><i class="fa-solid fa-arrow-right-from-bracket fa-rotate-180"></i> Sair</button>
                    </li>
                </form>
                <li class="nav-item">
                    <div class="dropdown">
                        <button class="btn dropdown-toggle" type="button" id="dropdownButton" data-bs-toggle="dropdown" >
                            @if(session()->get('theme') == 'light')
                                <i class="fa-solid fa-sun"></i>
                            @else
                                <i class="fa-solid fa-moon"></i>
                            @endif
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownButton">
                            <li><a href="{{ route('bg-theme','light') }}" class="dropdown-item"><i class="fa-solid fa-sun"></i> Light</a></li>
                            <li><a href="{{ route('bg-theme','dark') }}" class="dropdown-item"><i class="fa-solid fa-moon"></i> Dark</a></li>
                        </ul>
                    </div>
                </li>
            @endauth
        </ul>
    </div>
</div>
</nav>