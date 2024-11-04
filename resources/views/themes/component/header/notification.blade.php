<div class="dropdown d-inline-block">
    <button type="button" class="btn header-item noti-icon" id="page-header-notifications-dropdown-v"
        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="bx bx-bell icon-sm align-middle"></i>
        <span class="noti-dot bg-danger rounded-pill">0</span>
    </button>
    <div class="dropdown-menu dropdown-menu-xl dropdown-menu-end p-0"
        aria-labelledby="page-header-notifications-dropdown-v">
        <div class="p-3">
            <div class="row align-items-center">
                <div class="col">
                    <h5 class="m-0 font-size-15"> Notifikasi </h5>
                </div>
                <div class="col-auto">
                    <a href="#!" class="small fw-semibold text-decoration-underline notif-number"> 0 notifikasi
                        baru</a>
                </div>
            </div>
        </div>
        <div data-simplebar style="max-height: 250px;" id="notification-bar">
            <section></section>
        </div>
        <div class="p-2 border-top d-grid">
            <a class="btn btn-sm btn-link font-size-14 btn-block text-center" href="{{ route('notifikasi') }}">
                <i class="uil-arrow-circle-right me-1"></i> <span>Lainnya</span>
            </a>
        </div>
    </div>
</div>
