<header class="header header-sticky mb-4">
    <div class="container-fluid">
      <a class="header-toggler px-md-0 me-md-3" type="button" onclick="coreui.Sidebar.getInstance(document.querySelector('#sidebar')).toggle() ">
        <svg class="icon icon-lg">
          <use xlink:href="{{ asset('coreui-admin-template/vendors/@coreui/icons/svg/free.svg#cil-menu') }} "></use>
        </svg>
      </a>
      <ul class="header-nav ms-3">
        <li class="nav-item dropdown"><a class="nav-link py-0" data-coreui-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
            <div class="avatar avatar-md"><img class="avatar-img" src="{{ Auth::user()->getImageURL() }}" alt="{{ Auth::user()->name }}"></div>
          </a>
          <div class="dropdown-menu dropdown-menu-end pt-0">
              <a class="dropdown-item" href="{{ route('admin.profile') }}">
                <svg class="icon me-2">
                  <use xlink:href="{{ asset('coreui-admin-template/vendors/@coreui/icons/svg/free.svg#cil-user') }} "></use>
                </svg> Perfil
              </a>
              <a class="dropdown-item" href="">
                <svg class="icon me-2">
                  <use xlink:href="{{ asset('coreui-admin-template/vendors/@coreui/icons/svg/free.svg#cil-settings') }} "></use>
                </svg> Configurações
              </a>
            <div class="dropdown-divider"></div>
              <form action="{{ route('admin.logout') }}" method="post">
                @csrf
                <button type='submit' class="dropdown-item">
                  <svg class="icon me-2">
                    <use xlink:href="{{ asset('coreui-admin-template/vendors/@coreui/icons/svg/free.svg#cil-account-logout') }} "></use>
                  </svg> Logout
                </button>
            </form>
          </div>
        </li>
      </ul>
    </div>
    <div class="header-divider"></div>
    @include('admin.navigation')
  </header>