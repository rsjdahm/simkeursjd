<div class="alert alert-info bg-gradient-info m-0 border-0">
    <div class="row">
        <div class="col-12 col-md-3 p-0 text-center">
            <img src="{{ asset('assets/img/logo.png') }}" alt="Logo" height="84" />
        </div>
        <div class="col-12 col-md-9 text-center">
            <h2 class="alert-text d-block text-white m-0">
                <strong>Aplikasi Keuangan BLUD</strong>
            </h2>
            <span class="alert-text d-block">
                RSJD Atma Husada
                Mahakam
            </span>
            <div class="d-block">
                <button type="button" class="mt-2 btn btn-icon btn-sm btn-primary" data-toggle="tooltip"
                    data-placement="bottom" title="{{ \Carbon\Carbon::now()->isoFormat('dddd, D MMMM YYYY') }}">
                    <span class="btn-inner--icon"><i class="fas fa-clock"></i></span>
                    <span data-toggle="clock" class="btn-inner--text">{{
                        \Carbon\Carbon::now()->format('H:i:s')
                        }}</span>
                </button>
                <button type="button" class="mt-2 btn btn-icon btn-sm btn-warning"
                    onclick="return modal('Versi Rilisan Aplikasi','{{ route('versioning') }}')">
                    <span class="btn-inner--icon">
                        <i class="fas fa-thumbs-up"></i>
                    </span>
                    <span class="btn-inner--text">Cek Versi</span>
                </button>
            </div>
        </div>
    </div>
</div>