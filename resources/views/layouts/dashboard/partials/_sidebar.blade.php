<div class="sticky-top" style="top:0;left:0;bottom:0;z-index:9999;">
    <!-- Sidebar -->
    <ul class="navbar-nav sticky-top bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
            <div class="sidebar-brand-icon rotate-n-15">
                <img src="{{ asset('images/logo/logo.png') }}" alt="logo-CodeMate" width="100px">
            </div>
            <div class="sidebar-brand-text"><img src="{{asset('images/logo/title.png')}}" alt="CodeMate" width="150px"> </div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item @if (request()->is('dashboard')) active @endif">
            <a class="nav-link" href="{{ route('dashboard') }}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Projects
        </div>

        <!-- Nav Item - Projects -->
        <li class="nav-item @if (request()->is('projects')) active @endif">
            <a class="nav-link" href="{{ route('projects.index') }}">
                <i class="fas fa-fw fa-chart-area"></i>
                <span>Projects</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <div class="sidebar-heading">
            Suggestions
        </div>

        <!-- Nav Item - Suggested Projects -->
        <li class="nav-item @if (request()->is('projects/suggested')) active @endif">
            <a class="nav-link" href="{{ route('projects.suggested') }}">
                <i class="fas fa-fw fa-chart-area"></i>
                <span>Suggested Projects</span></a>
        </li>

        <!-- Nav Item - Suggested Users -->
        <li class="nav-item @if (request()->is('users/suggested')) active @endif">
            <a class="nav-link" href="{{ route('users.suggested') }}">
                <i class="fas fa-fw fa-chart-area"></i>
                <span>Suggested Users</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <div class="sidebar-heading">
            Research Blogs
        </div>

        <!-- Nav Item - Suggested Projects -->
        <li class="nav-item @if (request()->is('posts/create')) active @endif">
            <a class="nav-link" href="{{ route('posts.create') }}">
                <i class="fas fa-fw fa-chart-area"></i>
                <span>Post a blog</span></a>
        </li>
        <!-- Nav Item - Suggested Projects -->
        <li class="nav-item @if (request()->is('posts')) active @endif">
            <a class="nav-link" href="{{ route('posts.index') }}">
                <i class="fas fa-fw fa-chart-area"></i>
                <span>View all blogs</span></a>
        </li>

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>
    </ul>
    <!-- End of Sidebar -->
</div>
