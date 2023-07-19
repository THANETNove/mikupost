<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{url('/admin-home')}}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">manga</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->

    @if (Auth::user()->status == 0)
    <li class="nav-item">
        <a class="nav-link" href="{{url('/profile')}}">
            <i class="fa-solid fa-user"></i>
            <span>profile</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{url('/admin-home')}}">
            <i class="fa-solid fa-pen-to-square"></i>
            <span>รายชื่อมังงะ</span></a>
    </li>

    @else
    <li class="nav-item">
        <a class="nav-link" href="{{url('/admin-home')}}">
            <i class="fa-solid fa-pen-to-square"></i>
            <span>รายชื่อมังงะ</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{url('/category')}}">
            <i class="fa-solid fa-layer-group"></i>
            <span>หมวดหมู๋</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{url('/admin')}}">
            <i class="fa-solid fa-users"></i>
            <span>สมัครสมาชิก admin</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{url('/user-uploads')}}">
            <i class="fa-solid fa-users-viewfinder"></i>
            <span>สิทธิ uploads</span></a>
    </li>
    @endif




    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>