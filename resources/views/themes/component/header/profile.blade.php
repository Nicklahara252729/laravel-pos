<div class="dropdown d-inline-block">
    <button type="button" class="btn header-item user text-start d-flex align-items-center"
        id="page-header-user-dropdown-v" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <img class="rounded-circle header-profile-user" src="{{ asset('assets/images/users/'.Auth::user()->profile_photo_path) }}"
            alt="{{ Auth::user()->name }}">
        <span class="d-none d-xl-inline-block ms-2 fw-medium font-size-15">{{ Auth::user()->name }}</span>
    </button>
    <div class="dropdown-menu dropdown-menu-end pt-0">
        <div class="p-3 border-bottom">
            <h6 class="mb-0">{{ Auth::user()->name }}</h6>
            <p class="mb-0 font-size-11 text-muted">{{ Auth::user()->email }}</p>
        </div>
        @if (authAttribute()['level'] == 'owner' ||
                authAttribute()['level'] == 'superadmin' ||
                menuSplitting()->daftar_outlet == 'yes')
            <a class="dropdown-item" href="{{ url('profile/daftar-outlet') }}"><i
                    class="mdi mdi-store-outline text-muted font-size-16 align-middle me-2"></i> <span
                    class="align-middle">Daftar Outlet</span></a>
        @endif
        @if (authAttribute()['level'] == 'owner' ||
                authAttribute()['level'] == 'superadmin' ||
                menuSplitting()->pengaturan_akun == 'yes')
            <a class="dropdown-item" href="{{ url('profile/akun') }}"><i
                    class="mdi mdi-account-circle text-muted font-size-16 align-middle me-2"></i> <span
                    class="align-middle">Akun</span></a>
        @endif
        @if (authAttribute()['level'] == 'owner' ||
                authAttribute()['level'] == 'superadmin' ||
                menuSplitting()->pengaturan_umum == 'yes')
            <a class="dropdown-item" href="{{ url('profile/pengaturan') }}"><i
                    class="mdi mdi-cog-outline text-muted font-size-16 align-middle me-2"></i> <span
                    class="align-middle">Pengaturan</span></a>
        @endif
        <a class="dropdown-item" href="#" id="logout-button"><i
                class="mdi mdi-logout text-muted font-size-16 align-middle me-2"></i> <span
                class="align-middle">Logout</span></a>
        <form method="POST" action="{{ route('logout') }}" id="formLogout">
            @csrf
        </form>
    </div>
</div>
