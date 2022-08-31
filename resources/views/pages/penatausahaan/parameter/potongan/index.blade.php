<div class="row">
    <div class="col">
        <div class="card">
            <!-- Card header -->
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <h3 class="mb-0">Potongan Pajak</h3>
                        <p class="text-sm mb-0">
                            Potongan pajak akan digunakan sebagai parameter pada buku kas dan juga SPJ.
                        </p>
                    </div>
                    <div class="col-md-6 text-right">
                        <button type="button" class="mt-2 btn btn-icon btn-primary"
                            onclick="return showModalBox('Parameter Jenis Potongan','{{ route('jenis-potongan.index') }}', 'lg')">
                            <span class="btn-inner--icon">
                                <i class="fas fa-book-open"></i>
                            </span>
                            <span class="btn-inner--text">Jenis Potongan</span>
                        </button>
                        <button type="button" class="mt-2 btn btn-icon btn-success"
                            onclick="return showModalBox('Tambah Parameter Potongan','{{ route('potongan.create') }}')">
                            <span class="btn-inner--icon">
                                <i class="fas fa-plus"></i>
                            </span>
                            <span class="btn-inner--text">Tambah</span>
                        </button>
                    </div>
                </div>

            </div>
            <div class="table-responsive py-4">
                {!! $table->table(['id' => 'potongan']) !!}
            </div>
        </div>
    </div>
</div>

{!! $table->scripts() !!}