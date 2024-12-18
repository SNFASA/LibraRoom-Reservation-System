<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
    <div class="sidebar-brand-icon ">
      <i class="fas fa-building"></i>
    </div>
    <div class="sidebar-brand-text mx-3">Admin</div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <!-- Nav Item - Dashboard -->
  <li class="nav-item active">
    <a class="nav-link" href="">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span></a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- Heading -->
  <div class="sidebar-heading">
      Media
  </div>

  <!-- Nav Item - Pages Collapse Menu -->
  <!-- Nav Item - Charts -->
  <li class="nav-item">
      <a class="nav-link" href="{{route('file-manager')}}">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Media Manager</span></a>
  </li>
  <!-- Divider -->
  <hr class="sidebar-divider">
      <!-- Heading -->
      <div class="sidebar-heading">
          LibraRoom
      </div>

  <!-- Booking -->
  <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#bookingCollapse" aria-expanded="true" aria-controls="bookingCollapse">
        <i class="fas fa-book"></i>
        <span>Booking</span>
      </a>
      <div id="bookingCollapse" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Booking Options:</h6>
          <a class="collapse-item" href="{{route('booking.index')}}">Booking</a>
          <a class="collapse-item" href="{{route('booking.create')}}">Add Booking</a>
        </div>
      </div>
  </li>
  {{-- Room --}}
  <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#roomCollapse" aria-expanded="true" aria-controls="roomCollapse">
        <i class="fas fa-door-close"></i>
        <span>Room</span>
      </a>
      <div id="roomCollapse" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Room Options:</h6>
          <a class="collapse-item" href="">Romm</a>
          <a class="collapse-item" href="">Add Room</a>
        </div>
      </div>
  </li>

  {{-- Furniture --}}
  <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#furnitureCollapse" aria-expanded="true" aria-controls="furnitureCollapse">
        <i class="fas fa-chair"></i>
        <span>Furniture</span>
      </a>
      <div id="furnitureCollapse" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Furniture Options:</h6>
          <a class="collapse-item" href="">Furniture</a>
          <a class="collapse-item" href="">Add Furniture</a>
        </div>
      </div>
  </li>
  {{-- Electronic --}}
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#electronicCollapse" aria-expanded="true" aria-controls="electronicCollapse">
      <i class="fas fa-desktop"></i>
      <span>Electronic</span>
    </a>
    <div id="brandCollapse" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Electronic Options:</h6>
        <a class="collapse-item" href="">Electronic</a>
        <a class="collapse-item" href="">Add Electronic</a>
      </div>
    </div>
</li>
  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">
   <!-- Heading -->
  <div class="sidebar-heading">
      General Settings
  </div>
   <!-- Users -->
   <li class="nav-item">
      <a class="nav-link" href="{{route('users.index')}}">
          <i class="fas fa-users"></i>
          <span>Users</span></a>
  </li>
   <!-- General settings -->
   <li class="nav-item">
      <a class="nav-link" href="{{route('settings')}}">
          <i class="fas fa-cog"></i>
          <span>Settings</span></a>
  </li>

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>

</ul>