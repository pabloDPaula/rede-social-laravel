   <div class="card overflow-hidden">
            <div class="card-body pt-3">
                <ul class="nav nav-link-secondary flex-column fw-bold gap-2">
                    <li class="nav-item">
                        <a class="nav-link {{ Route::is('dashboard.index') ? 'text-white bg-primary rounded' : '' }}" href="{{ route('dashboard.index') }}">
                            <span>{{ __('dashboard.left-sidebar.start') }}</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span>{{ __('dashboard.left-sidebar.to-explore') }}</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Route::is('feed') ? 'text-white bg-primary rounded' : '' }}" href="{{ route('feed') }}">
                            <span>{{ __('dashboard.left-sidebar.feed') }}</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span>{{ __('dashboard.left-sidebar.terms') }}</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span>{{ __('dashboard.left-sidebar.support') }}</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span>{{ __('dashboard.left-sidebar.settings') }}</span></a>
                    </li>
                </ul>
            </div>
        </div>