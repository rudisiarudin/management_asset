<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" key="t-menu">Menu</li>
                <li>
                    <a href="{{ route('home') }}" class="waves-effect">
                        <i class="bx bx-home-circle"></i>
                        <span key="t-dashboards">Dashboards</span>
                    </a>
                </li>
                <li>
                    <a href="javascript: void(0);" class="waves-effect">
                        <i class="bx bx bx-layer"></i>
                        <span key="t-dashboards">Master Asset</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ url('/asset') }}" key="t-default">Asset IT</a></li>
                        <li><a href="{{ url('/comingsoon') }}" key="t-crypto">Asset Machine</a></li>
                        <li><a href="{{ url('/comingsoon') }}" key="t-saas">Asset Ride</a></li>
                        <li><a href="index.html" key="t-blog">Asset Furniture</a></li>
                    </ul>
                </li>
                <li>
                    <a href="{{ url('/location') }}" class="waves-effect">
                        <i class="bx bx-store"></i>
                        <span key="t-chat">Locations</span>
                    </a>
                </li>

                <li class="menu-title" key="t-apps">Apps</li>
                <li>
                    <a href="{{ url('/procurement') }}" class="waves-effect">
                        <i class="bx bx-cart-alt"></i>
                        <span class="badge rounded-pill bg-success float-end" key="t-new">New</span>
                        <span key="t-file-manager">Procurement</span>
                    </a>
                </li>

                @canany(['isAdmin', 'isSuperAdmin'])
                <li class="menu-title" key="t-pages">Admin Page</li>
                <li>
                    <a href="{{ url('/categories') }}" class="waves-effect">
                        <i class="bx bx bx-layer"></i>
                        <span key="t-chat">Categories</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('/user') }}" class="waves-effect">
                        <i class="bx bx-shield-quarter"></i>
                        <span class="badge rounded-pill bg-success float-end" key="t-new">New</span>
                        <span key="t-file-manager">Management Role</span>
                    </a>
                </li>
                @endcanany

                
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->