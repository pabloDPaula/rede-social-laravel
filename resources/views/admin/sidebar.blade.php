<div class="sidebar sidebar-dark sidebar-fixed" id="sidebar">
    <div class="sidebar-brand d-none d-md-flex">
      <span class="sidebar-brand-full">Social Networking</span>
      <span class="sidebar-brand-narrow">Social </span>
    </div>
    <ul class="sidebar-nav" data-coreui="navigation" data-simplebar="">
      <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.dashboard') }}">
          <svg class="nav-icon">
            <use xlink:href="{{ asset('coreui-admin-template/vendors/@coreui/icons/svg/free.svg#cil-speedometer') }} "></use>
          </svg> Dashboard
        </a>
      </li>
    </ul>
    <button class="sidebar-toggler" type="button" data-coreui-toggle="unfoldable"></button>
  </div>