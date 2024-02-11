<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-body-tertiary sidebar collapse">
    <div class="position-sticky pt-3 sidebar-sticky">
        @if (Auth::user()->role_id == 1)
            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                <span>ADMINISTRATOR</span>
            </h6>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" aria-current="page"
                        href="/dashboard">
                        <span data-feather="home" class="align-text-bottom"></span>
                        Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('dashboard/marketing*') ? 'active' : '' }}" aria-current="page"
                        href="/dashboard/marketing">
                        <span data-feather="users" class="align-text-bottom"></span>
                        User Marketing
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('dashboard/paket*') ? 'active' : '' }}" href="/dashboard/paket">
                        <span data-feather="archive" class="align-text-bottom"></span>
                        Paket
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('dashboard/sales*') ? 'active' : '' }}" href="/dashboard/sales">
                        <span data-feather="file-text" class="align-text-bottom"></span>
                        List Penjualan
                    </a>
                </li>
            @else
                <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                    <span>MARKETING</span>
                </h6>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('dashboard/sales/create') ? 'active' : '' }}"
                            href="/dashboard/sales/create">
                            <span data-feather="user-plus" class="align-text-bottom"></span>
                            Registrasi Customer
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('dashboard/sales/list-sales') ? 'active' : '' }}"
                            href="/dashboard/sales/list-sales">
                            <span data-feather="file-text" class="align-text-bottom"></span>
                            List Penjualan
                        </a>
                    </li>
                </ul>
        @endif
    </div>
</nav>
