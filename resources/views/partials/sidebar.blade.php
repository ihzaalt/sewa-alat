<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('admin.dashboard.index') }}">
                <div class="sidebar-brand-icon rotate-n-15">

                </div>
                <div class="sidebar-brand-text mx-3">Admin </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('admin.dashboard.index') }}">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <li class="nav-item active">
                <a class="nav-link" href="{{ route('admin.barang.index') }}">
                    <i class="fas fa-fw fa-list"></i>
                    <span>Daftar Barang</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('admin.messages.index') }}">
                    <i class="fas fa-fw fa-comments"></i>
                    <span>Feedback</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" oncLick="document.getElementById('logout-form').submit()" href="#">
                    <i class="fas fa-fw fa-arrow-left"></i>
                    <span>Logout</span></a>
                    <form id="logout-form" action="{{ route('logout') }}" method="post">
                        @csrf
                    </form>
            </li>

            <!-- Nav Item - Pages Collapse Menu fas fa-fw fa-list-->
        </ul>