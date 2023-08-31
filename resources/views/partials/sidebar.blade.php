<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="{{ route('dashboard') }}" class="app-brand-link">
            <span class="app-brand-logo demo">
                <img src="{{ asset('logo-sekolah.png') }}" width="200" />
            </span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboard -->
        <li class="menu-item mb-2 {{ request()->is('dashboard') ? 'active' : '' }}">
            <a href="{{ route('dashboard') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
            </a>
        </li>

        <li class="menu-item mb-2 {{ request()->is('siswa') ? 'active' : '' }}">
            <a href="{{ route('siswa') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Siswa</div>
            </a>
        </li>

        @if(auth()->user()->jenjang === 'admin')

            <li class="menu-item">
                <a href="javascript:void(0);" class="menu-link menu-toggle {{ request()->is('biaya*') ? 'active' : '' }}">
                    <i class="menu-icon tf-icons bx bx-dock-top"></i>
                    <div data-i18n="Account Settings">Biaya</div>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item {{ request()->is('biaya/perlengkapan') ? 'active' : '' }}">
                        <a href="{{ route('perlengkapan.index') }}" class="menu-link">
                            <div data-i18n="Account">Biaya Perlengkapan</div>
                        </a>
                    </li>
                    <li class="menu-item {{ request()->is('biaya/dana-pendidikan') ? 'active' : '' }}">
                        <a href="{{ route('dana-pendidikan.index') }}" class="menu-link">
                            <div data-i18n="Notifications">Dana Partisipasi Pendidikan</div>
                        </a>
                    </li>
                    <li class="menu-item {{ request()->is('biaya/sistem-bayar') ? 'active' : '' }}">
                        <a href="{{ route('sistem-bayar.index') }}" class="menu-link">
                            <div data-i18n="Connections">Sistem Bayar</div>
                        </a>
                    </li>
                </ul>
            </li>

            @endif


    </ul>
</aside>
