 <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{url('/')}}" class="brand-link">
      <img src="{{url('dashboard')}}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Tracking System</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">


      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

            @role('client')
            <li class="nav-item has-treeview">
                <a href="{{route('createOrder')}}" class="nav-link">
                    <i class="fas fa-plus"></i>
                    <p>Create Order</p>
                </a>
            </li>
            @endrole
            @role('admin|client')
          <li class="nav-item has-treeview">
            <a href="{{route('orders')}}" class="nav-link">
                <i class="fas fa-map"></i>
                <p>Orders</p>
            </a>
          </li>
            @endrole

      </nav>

      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->

  </aside>

