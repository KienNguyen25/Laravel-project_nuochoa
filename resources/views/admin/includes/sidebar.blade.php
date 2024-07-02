<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img src="/admin/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
            @if (isset(Auth::guard('admin')->user()->name))
                <a href="#" class="d-block">{{Auth::guard('admin')->user()->name}}</a>
            @endif
        </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->
            <li class="nav-item has-treeview ">
                <a href="{{route('admin.dashboard')}}" class="nav-link @if (request()->routeIs('admin.dashboard')) active  @endif">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Tổng quan
                    </p>
                </a>
            </li>
            <li class="nav-item has-treeview  ">
                <a href="{{route('admin.categories.list')}}" class="nav-link @if(request()-> routeIs('admin.categories.*')) active @endif">
                    <i class="nav-icon fa-solid fa-bars"></i>
                    <p>
                        Quản lý danh mục
                    </p>
                </a>
            </li>
            <li class="nav-item has-treeview  ">
                <a href="{{route('admin.brands.list')}}" class="nav-link @if(request()-> routeIs('admin.brands.*')) active @endif">
                    <i class="nav-icon fa-solid fa-landmark"></i>
                    <p>
                        Quản lý nhãn hiệu
                    </p>
                </a>
            </li>
            <li class="nav-item has-treeview">
                <a href="{{route('admin.products.list')}}" class="nav-link @if(request()-> routeIs('admin.products.*')) active @endif">
                    <i class="nav-icon fa-solid fa-flask"></i>
                    <p>
                        Quản lý sản phẩm
                    </p>
                </a>
            </li>
            <li class="nav-item has-treeview">
                <a href="{{route('admin.orders.list')}}" class="nav-link @if(request()-> routeIs('admin.orders.*')) active @endif">
                    <i class="nav-icon fa-solid fa-cart-shopping"></i>
                    <p>
                        Quản lý đơn hàng
                    </p>
                </a>
            </li>
            <li class="nav-item has-treeview">
                <a href="{{route('admin.users.list')}}" class="nav-link @if(request()-> routeIs('admin.users.*')) active @endif">
                    <i class="nav-icon fa-solid fa-user"></i>
                    <p>
                        Quản lý khách hàng
                    </p>
                </a>
            </li>
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
