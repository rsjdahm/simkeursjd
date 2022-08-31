<nav class="sidenav navbar navbar-vertical fixed-left navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
        <div class="sidenav-header d-flex align-items-center">
            <a class="navbar-brand px-3 py-0" href="{{ url('/') }}">
                <img src="{{ asset('assets/img/logo.png') }}" class="navbar-brand-img" alt="...">
                <h3 class="d-inline-block ml-1 p-0"><strong>SIMKEU</strong></h3>
            </a>
            <div class="ml-auto">
                <div class="sidenav-toggler d-none d-xl-block" data-action="sidenav-unpin" data-target="#sidenav-main">
                    <div class="sidenav-toggler-inner">
                        <i class="sidenav-toggler-line"></i>
                        <i class="sidenav-toggler-line"></i>
                        <i class="sidenav-toggler-line"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="navbar-inner mt-3">
            <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                <ul class="navbar-nav">
                    <li class="navbar-heading text-muted pt-0 pb-1 font-weight-bold">
                        Modul Aplikasi
                    </li>
                    <li class="navbar-heading text-muted pt-0 pb-4 text-capitalize">
                        <select name="menu_category" onchange="ubah_menu()" class="form-control form-control-sm"
                            data-toggle="select">
                            <option value="anggaran">Anggaran</option>
                            <option value="penatausahaan">Penatausahaan</option>
                            <option value="spt">SPT</option>
                            {{-- <option value="administrator">Administrator</option> --}}
                        </select>
                    </li>
                    <div id="menu-container"></div>
                </ul>
            </div>
        </div>
    </div>
</nav>

@push('scripts')
<script>
    $(function () {
        ubah_menu();
    });
    function ubah_menu()
    {
        $.ajax({
            url: "{{ route('menu', '') }}"+"/"+$('[name="menu_category"]').val(),
            type: "GET",
            beforeSend: function (response) {
                $("#menu-container").html(`<div class="d-flex flex-row align-items-center justify-content-center"><i class="fas fa-spinner fa-spin fa-2x text-primary"></i><small class="ml-3 text-primary">Memuat SimKeU</small></div>`);
            },
            success: function(response){
                $("#menu-container").html(response);
            },
            error: function (xhr) {
                console.log(xhr.responseJSON);
                showNotif("danger", "Load Menu Gagal!", xhr.responseJSON.message);
            },
        });
    }
</script>
@endpush