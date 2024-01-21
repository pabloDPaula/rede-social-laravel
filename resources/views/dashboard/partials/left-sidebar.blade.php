   <div class="card overflow-hidden">
            <div class="card-body pt-3">
                <ul class="nav nav-link-secondary flex-column fw-bold gap-2">
                    <li class="nav-item">
                        <a class="nav-link {{ Route::is('dashboard.index') ? 'text-white bg-primary rounded' : '' }}" href="{{ route('dashboard.index') }}">
                            <span>Início</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span>Explorar</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Route::is('feed') ? 'text-white bg-primary rounded' : '' }}" href="{{ route('feed') }}">
                            <span>Feed</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span>Termos</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span>Suporte</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span>Configurações</span></a>
                    </li>
                </ul>
            </div>
            <div class="card-footer text-center py-2">
                <a class="btn btn-link btn-sm" href="#">Ver perfil </a>
            </div>
        </div>