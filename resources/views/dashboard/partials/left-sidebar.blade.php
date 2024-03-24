   <div class="card timeline-navigation">
            <div class="card-body pt-3">
                <ul class="nav flex-column gap-2">
                    <li class="nav-item">
                        <a class="nav-link {{ Route::is('dashboard.index') ? 'active' : '' }}" href="{{ route('dashboard.index') }}">
                            <span><i class="fa-solid fa-house me-2"></i>{{ __('dashboard.left-sidebar.start') }}</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Route::is('profile') ? 'active' : '' }}" href="{{ route('profile') }}">
                            <span><i class="fa-solid fa-user"></i> Perfil</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Route::is('feed') ? 'active' : '' }}" href="{{ route('feed') }}">
                            <span><i class="fa-solid fa-user-group"></i> {{ __('dashboard.left-sidebar.feed') }}</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span><i class="fa-solid fa-people-group"></i> Grupo</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span><i class="fa-solid fa-calendar-days"></i> Evento</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span><i class="fa-solid fa-store"></i> Marketplace</span></a>
                    </li>
                </ul>
            </div>
        </div>