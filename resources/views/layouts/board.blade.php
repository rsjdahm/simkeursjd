<div class="wrapper ">
    <div class="sidebar" data-color="azure" data-background-color="black">
        <div class="logo" style="cursor: pointer;">
            <a onclick="return load('{{ route('dashboard') }}')" class="simple-text logo-mini">
                <img height="20" src="{{ asset('assets/img/logo.png') }}">
            </a>
            <a onclick="return load('{{ route('dashboard') }}')" class="simple-text logo-normal">
                SIMKEU BLUD
            </a>
        </div>
        <div class="sidebar-wrapper">
            <div class="user">
                <div class="photo">
                    <img src="https://pbb.gresikkab.go.id/espop//assets/img/faces/admin.png" />
                </div>
                <div class="user-info">
                    <a data-toggle="collapse" href="#collapseExample" class="username" style="padding-top: 0px;">
                        <span style="padding-left: 50px;">
                            <span
                                style="text-transform: capitalize ;font-weight: bold;font-size: 16px; white-space:normal;">{{
                                Str::upper(Auth::user()->nama) }}</span><br>
                            <span style="font-size: 13px; white-space: normal;">{{
                                Str::title(Auth::user()->jabatan)
                                }}</span>
                            <b class="caret"></b>
                        </span>
                    </a>
                    <div class="collapse" id="collapseExample">
                        <ul class="nav">
                            <li class="nav-item">
                                <form id="logoutForm" method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="a nav-link">
                                        <span class="sidebar-mini"> <span class="material-icons">logout</span></span>
                                        </span>
                                        <span class="sidebar-normal"> Logout </span>
                                    </button>
                                </form>
                                <script>
                                    $("#logoutForm").on("submit", function (event) {
                                        event.preventDefault();
                                        var form = $(this);
                                        var formData = new FormData($(this)[0]);
                                        $.ajax({
                                            url: form.attr("action"),
                                            type: form.attr("method"),
                                            data: formData,
                                            processData: false,
                                            contentType: false,
                                            success: function (response) {
                                                notify("success", "Logout Berhasil", "Apabila terdapat masalah silakan hubungi Administrator.");
                                                return load(response);
                                            },
                                            error: function (xhr) {
                                                notify("danger", "Logout Gagal!", xhr.responseJSON.message);
                                            },
                                        });
                                        return false;
                                    });
                                </script>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <ul class="nav menu_petugas">
                <li class="nav-item active" id="m-dashboard"><a class="nav-link"
                        href="https://pbb.gresikkab.go.id/espop/administrator"><i class="material-icons">dashboard</i>
                        <p> Dashboard </p>
                    </a></li>
                <li class="nav-item " id="m-pengajuan"><a class="nav-link"
                        href="https://pbb.gresikkab.go.id/espop/administrator/pengajuan"><i
                            class="material-icons">assignment</i>
                        <p> Pengajuan </p>
                    </a></li>
                <li class="nav-item " id="m-pengajuan_all"><a class="nav-link"
                        href="https://pbb.gresikkab.go.id/espop/administrator/pengajuan_all"><i
                            class="material-icons">manage_search</i>
                        <p> Semua Pengajuan </p>
                    </a></li>
                <li class="nav-item " id="m-nop_znt"><a class="nav-link"
                        href="https://pbb.gresikkab.go.id/espop/administrator/Nopznt"><i
                            class="material-icons">library_books</i>
                        <p> NOP &amp; ZNT </p>
                    </a></li>
                <li class="nav-item " id="m-beritaacara"><a class="nav-link"
                        href="https://pbb.gresikkab.go.id/espop/administrator/Beritaacara"><i
                            class="material-icons">grading</i>
                        <p> Berita Acara </p>
                    </a></li>
                <li class="nav-item " id="m-managemen"><a class="nav-link"
                        href="https://pbb.gresikkab.go.id/espop/administrator/managemen/users"><i
                            class="material-icons">supervisor_account</i>
                        <p> Managemen User </p>
                    </a></li>
            </ul>
        </div>
    </div>
    <div class="main-panel">

        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
            <div class="container-fluid">
                <div class="navbar-wrapper">
                    <div class="navbar-minimize">
                        <button id="minimizeSidebar" class="btn btn-just-icon btn-white btn-fab btn-round">
                            <i class="material-icons text_align-center visible-on-sidebar-regular">more_vert</i>
                            <i class="material-icons design_bullet-list-67 visible-on-sidebar-mini">view_list</i>
                        </button>
                        <script>
                            $('#minimizeSidebar').click(function() {
                                var $btn = $(this);
                        
                                if (md.misc.sidebar_mini_active == true) {
                                    $('body').removeClass('sidebar-mini');
                                    md.misc.sidebar_mini_active = false;
                                } else {
                                    $('body').addClass('sidebar-mini');
                                    md.misc.sidebar_mini_active = true;
                                }
                        
                                // we simulate the window Resize so the charts will get updated in realtime.
                                var simulateWindowResize = setInterval(function() {
                                    window.dispatchEvent(new Event('resize'));
                                }, 180);
                        
                                // we stop the simulation of Window Resize after the animations are completed
                                setTimeout(function() {
                                    clearInterval(simulateWindowResize);
                                }, 1000);
                         });
                        </script>
                    </div>
                    <a class="navbar-brand" href="javascript:;">Dashboard</a>
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="navbar-toggler-icon icon-bar"></span>
                    <span class="navbar-toggler-icon icon-bar"></span>
                    <span class="navbar-toggler-icon icon-bar"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="https://pbb.gresikkab.go.id/espop/administrator/list_chat"
                                aria-haspopup="true" aria-expanded="false" title="Pesan Belum Dibaca">
                                <i class="material-icons">chat</i>
                                <span class="notification" id="chat_notification" style="display: none;">0</span>
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="https://pbb.gresikkab.go.id/espop/administrator/Nopznt"
                                aria-haspopup="true" aria-expanded="false"
                                title="Terverifikasi tapi belum ada NOP dan ZNT">
                                <i class="material-icons">warning</i>
                                <span class="notification" id="nop_znt_notification" style="display: none;">0</span>
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="https://pbb.gresikkab.go.id/espop/Administrator/Pengajuan/?jns=1"
                                aria-haspopup="true" aria-expanded="false"
                                title="Jumlah pengajuan Data Baru yang belum selesai">
                                b<i class="material-icons">bookmark_border</i>
                                <span class="notification" id="notif_data_baru"
                                    style="background: #4caf50;display: none;">0</span>
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="https://pbb.gresikkab.go.id/espop/Administrator/Pengajuan/?jns=2"
                                aria-haspopup="true" aria-expanded="false"
                                title="Jumlah pengajuan Balik Nama yang belum selesai">
                                bn<i class="material-icons">bookmark_border</i>
                                <span class="notification" id="notif_balik_nama"
                                    style="background: #4caf50;display: none;">0</span>
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="https://pbb.gresikkab.go.id/espop/Administrator/Pengajuan/?jns=3"
                                aria-haspopup="true" aria-expanded="false"
                                title="Jumlah pengajuan Mutasi Split yang belum selesai">
                                s<i class="material-icons">bookmark_border</i>
                                <span class="notification" id="notif_split"
                                    style="background: #4caf50;display: none;">0</span>
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="https://pbb.gresikkab.go.id/espop/Administrator/Pengajuan/?jns=4"
                                aria-haspopup="true" aria-expanded="false"
                                title="Jumlah pengajuan Pembetulan yang belum selesai">
                                pb<i class="material-icons">bookmark_border</i>
                                <span class="notification" id="notif_pembetulan"
                                    style="background: #4caf50;display: none;">0</span>
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="https://pbb.gresikkab.go.id/espop/Administrator/Pengajuan/?jns=5"
                                aria-haspopup="true" aria-expanded="false"
                                title="Jumlah pengajuan Penghapusan yang belum selesai">
                                ph<i class="material-icons">bookmark_border</i>
                                <span class="notification" id="notif_penghapusan"
                                    style="background: #4caf50;display: none;">0</span>
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="https://pbb.gresikkab.go.id/espop/Administrator/Pengajuan/?jns=6"
                                aria-haspopup="true" aria-expanded="false"
                                title="Jumlah pengajuan Penggabungan yang belum selesai">
                                pg<i class="material-icons">bookmark_border</i>
                                <span class="notification" id="notif_penggabungan"
                                    style="background: #4caf50;display: none;">0</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="content">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-md-12">
                        <div id="banner" class="card card-dashboard" style="margin-top: 0px;">
                            <div class="card-body" style="text-align: center;">
                                <p style="font-size: 1.5rem; font-weight: bold;">Pemerintah Kabupaten Gresik</p>
                                <p style="margin-top: -5px; font-size: 1.2rem; font-weight: bold;">Badan Pendapatan
                                    Pengelolaan Keuangan dan Aset Daerah (BPPKAD)</p>
                                <p style="margin-top: -10px; font-size: 0.8rem;">Jl. Dr. Wahidin Sudirohusodo No.
                                    245 Gresik Telp. (031) 3930729, Email : bppkad@gresikkab.go.id</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="card card-stats card-dashboard">
                            <div class="card-header card-header-default card-header-icon">
                                <div class="card-icon">
                                    <i class="material-icons">forward_to_inbox</i>
                                </div>
                                <p class="card-category">Total Pengajuan</p>
                                <h3 class="card-title" id="total_pengajuan">0</h3>
                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                    <p style="margin-bottom: 0px;">Tahun 2022</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="card card-stats card-dashboard">
                            <div class="card-header card-header-info card-header-icon">
                                <div class="card-icon">
                                    <i class="material-icons">mark_email_unread</i>
                                </div>
                                <p class="card-category">Pengajuan Aktif</p>
                                <h3 class="card-title" id="pengajuan_aktif">0</h3>
                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                    <p style="margin-bottom: 0px;">Tahun 2022</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="card card-stats card-dashboard">
                            <div class="card-header card-header-success card-header-icon">
                                <div class="card-icon">
                                    <i class="material-icons">mark_email_read</i>
                                </div>
                                <p class="card-category" style="font-size: 12px !important;">Pengajuan Selesai</p>
                                <h3 class="card-title" id="pengajuan_diterima">0</h3>
                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                    <p style="margin-bottom: 0px;">Tahun 2022</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="card card-stats card-dashboard">
                            <div class="card-header card-header-danger card-header-icon">
                                <div class="card-icon">
                                    <i class="material-icons">unsubscribe</i>
                                </div>
                                <p class="card-category" style="font-size: 12px !important;">Pengajuan Ditolak</p>
                                <h3 class="card-title" id="pengajuan_ditolak">0</h3>
                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                    <p style="margin-bottom: 0px;">Tahun 2022</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->

            </div>
        </div>




        <footer class="footer">
            <div class="container-fluid">
                <div class="copyright float-right">
                    &copy;
                    2022
                    <a href="http://bppkad.gresikkab.go.id/" target="_blank">Badan Pendapatan Pengelolaan Keuangan
                        dan Aset Daerah</a> Kabupaten Gresik.
                </div>
            </div>
        </footer>
    </div>
</div>