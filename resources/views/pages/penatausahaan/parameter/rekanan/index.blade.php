<div class="row">
    <div class="col">
        <div class="card">
            <!-- Card header -->
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <h2 class="mb-0">Data Rekanan</h3>
                            <p class="text-sm mb-0">
                                Data rekanan akan digunakan untuk pemilihan rekening bank tujuan pada menu SPP dan Bukti
                                Pengeluaran.
                            </p>
                    </div>
                    <div class="col-md-6 text-right">
                        <button type="button" class="mt-2 btn btn-icon btn-primary"
                            onclick="return showModalBox('Parameter Bentuk Usaha','{{ route('bentuk-rekanan.index') }}', 'lg')">
                            <span class="btn-inner--icon">
                                <i class="fas fa-book-open"></i>
                            </span>
                            <span class="btn-inner--text">Bentuk Usaha</span>
                        </button>
                        <button type="button" class="mt-2 btn btn-icon btn-success"
                            onclick="return showModalBox('Tambah Data Rekanan','{{ route('rekanan.create') }}', 'lg')">
                            <span class="btn-inner--icon">
                                <i class="fas fa-plus"></i>
                            </span>
                            <span class="btn-inner--text">Tambah</span>
                        </button>
                    </div>
                </div>

            </div>
            <div class="table-responsive py-4">
                {!! $table->table(['id' => 'rekanan']) !!}
            </div>
        </div>
    </div>
</div>

{!! $table->scripts() !!}