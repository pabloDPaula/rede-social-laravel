<div class="container-fluid">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb my-0 ms-2">
        <li class="breadcrumb-item">
          <!-- if breadcrumb is single--><span>Home</span>
        </li>
        @if(Route::is('admin.dashboard'))
          <li class="breadcrumb-item active"><span>Dashboard</span></li>
        @elseif(Route::is('admin.profile'))
          <li class="breadcrumb-item active"><span>Perfil</span></li>
        @endif
      </ol>
    </nav>
  </div>