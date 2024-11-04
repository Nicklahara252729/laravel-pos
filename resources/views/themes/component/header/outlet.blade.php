<div class="d-flex">
    <!-- LOGO -->
    <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect vertical-menu-btn">
        <i class="bx bx-menu align-middle"></i>
    </button>

    <!-- start page title -->
    <div class="page-title-box align-self-center none md:flex gap-2" id="outlet-choice">
        <div class="dropdown">
            <button class="btn btn-soft-primary dropdown-toggle" type="button" id="dropdownMenuButton"
                data-bs-toggle="dropdown" aria-expanded="false">
                <div class="w-full h-full flex justify-between gap-3 items-center">
                    <i class="bx bx-store"></i> <span id="default-outlet-name">Pilih outlet</span> <i
                        class="mdi mdi-chevron-down"></i>
                </div>
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <div class="max-h-96 overflow-y-scroll" id="outlet-list">
                </div>
            </div>
        </div>
        <div id="reportrange" class="form-control cursor-pointer d-none">
            <i class="fa fa-calendar"></i>&nbsp;
            <span></span> <i class="fa fa-caret-down"></i>
        </div>
    </div>
    <!-- end page title -->

</div>
