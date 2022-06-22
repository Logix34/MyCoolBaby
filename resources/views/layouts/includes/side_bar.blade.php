
<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">My Cool Baby </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{Request::is('dashboard') ? 'active' : ''}}">
        <a class="nav-link " href="{{url('dashboard')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>

    <!-- Nav Item - Pages  Menu -->
    <li class="nav-item {{Request::is('users') ? 'active' : ''}} ">
        <a class="nav-link "  href="{{url('users')}}">
            <i class="fas fa-users"></i>
            <span>Users</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">
    <li class="nav-item {{Request::is('categories') ? 'active' : ''}} ">
        <a class="nav-link "  href="{{url('categories')}}">
            <i class="fas fa-ellipsis-v"></i>
            <span>Categories</span></a>
    </li>
    <li class="nav-item {{Request::is('sub_categories') ? 'active' : ''}} ">
        <a class="nav-link "  href="{{url('sub_categories')}}">
            <i class="fas fa-list-alt"></i>
            <span>Sub Categories</span></a>
    </li>
    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
<!-- End of Sidebar -->


{{--////////////////////////////////////////////////......Main Top Bar Content............///////////////////////////////////////--}}
