<div class="row">
    <div class="col">
        <div class="card">
            <!-- Card header -->
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h3 class="mb-0">Pagu Murni</h3>
                        {{-- <p class="text-sm mb-0">
                            Potongan akan digunakan sebagai parameter pada buku kas dan juga SPJ.
                        </p> --}}
                    </div>
                    {{-- <div class="col-md-4 text-right">
                        <button type="button" class="mt-2 btn btn-sm btn-icon btn-success"
                            onclick="return showModalBox('Tambah Uraian Rekening','{{ route('pagu-murni.create') }}', 'lg')">
                            <span class="btn-inner--icon">
                                <i class="fas fa-plus"></i>
                            </span>
                            <span class="btn-inner--text">Tambah Uraian</span>
                        </button>
                    </div> --}}
                </div>

            </div>
            <div class="table-responsive">
                {!! $table->table(['id' => 'pagu-murni']) !!}
            </div>
        </div>
    </div>
</div>

{!! $table->scripts() !!}