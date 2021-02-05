<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        
        <div class="info">
          <a href="#" class="d-block">Tracking Covid</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
         
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                kasus lokal
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">6</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('provinsi.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>provinsi</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('kota.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>kota</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('kecamatan.index')}}"  class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>kecamatan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('kelurahan.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>kelurahan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('rw.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>RW</p>
                </a>
                <li class="nav-item">
                <a href="{{route('kasus2.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>kasus</p>
                </a>
              </li>
            </ul>
          </li>
                  
              <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                kasus global
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">2</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('provinsi.index'" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>country</p>
                </a>
              </li>
                </li>
              
        
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>