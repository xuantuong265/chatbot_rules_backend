<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('admin.home') }}" class="brand-link">

      <span class="brand-text font-weight-light">Page Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
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

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fas fa-align-justify"></i>
              <p>
               Category
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
                @can('add category')
                <li class="nav-item">
                    <a href="{{route('category.add')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Add category</p>
                    </a>
                  </li>
                @endcan
                @can('read category')
              <li class="nav-item">
                <a href="{{route('category.show')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List category</p>
                </a>
              </li>
                @endcan

            </ul>
          </li>


                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fa fa-shopping-bag"></i>
                        <p>Prouduct
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                    @can('add product')
                        <li class="nav-item">
                            <a href="{{ route('product.add') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add product</p>
                            </a>
                        </li>
                        @endcan
                   @can('read product')
                        <li class="nav-item">
                            <a href="{{route('product.show')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>List product</p>
                            </a>
                        </li>
                        @endcan
                    </ul>
                </li>
                @role('admin')

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-images"></i>
                        <p> Banner
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @can('add banner')
                        <li class="nav-item">
                            <a href="{{ route('banner.showCreate') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Banner</p>
                            </a>
                        </li>
                        @endcan
                        @can('read banner')
                        <li class="nav-item">
                            <a href="{{route('banner.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>List banner</p>
                            </a>
                        </li>
                        @endcan
                    </ul>
                </li>
                @endrole
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-cart-plus"></i>
                        <p> Cart
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                @can('read cart')
                        <li class="nav-item">
                            <a href="{{ route('show.orders') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>List cart</p>
                            </a>
                        </li>
                @endcan
                    </ul>
                </li>
                @role('admin')
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fa fa-user"></i>
                        <p> User
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                    @can('add user')
                        <li class="nav-item">
                            <a href="{{ route('user.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add user</p>
                            </a>
                        </li>
                    @endcan
                    @can('read user')
                        <li class="nav-item">
                            <a href="{{route('user.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>List User</p>
                            </a>
                        </li>
                    @endcan
                    </ul>
                </li>
                @endrole
                <li class="nav-item">
                    <a href="{{ route('admin.logout') }}" class="nav-link">
                        <i class="fas fa-sign-out-alt">
                        </i>
                        <p> Logout

                        </p>
                    </a>

                </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
