<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="#">Teknik Informatika | KSI5A</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="#">KSI</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Menu</li>

            <!-- Dashboard Menu -->
            <li class="{{ Route::is('admin.dashboard') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.dashboard') }}">
                    <i class="fas fa-chart-line" style="color: #3F51B5;"></i>                    <span>Dashboard</span>
                </a>
            </li>

            <!-- Produk Menu -->
            <li class="{{Request::is('product*')? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.product')}}">
                    <i class="fas fa-box-open" style="color: #FFC107;"></i>                       <span>Produk</span>
                </a>
            </li>

            <!-- Distributor Menu -->
            <li class="{{Route::is('admin.distributor')? 'active' : ''}}">
                <a class="nav-link" href="{{ route('admin.distributor')}}">
                    <i class="fas fa-truck-loading" style="color: #8E24AA;"></i>                     <span>Distributor</span>
                </a>
            </li>

            <!-- Flashsale Menu -->
            <li class="{{Route::is('admin.flashsales')? 'active' : ''}}">
                <a class="nav-link" href="{{ route('admin.flashsales')}}">
                    <i class="fas fa-tags" style="color: #E91E63;"></i>                         <span>Flash Sale</span>
                </a>
            </li>
        </ul>

    </aside>
</div>