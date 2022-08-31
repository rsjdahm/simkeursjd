<div class="card-header pt-0">
    <div class="row align-items-center">
        <div class="col-md-8 px-0">
            <h3 class="mb-0">Jenis Potongan</h3>
        </div>
        <div class="col-md-4 text-right">
            <button type="button" class="mt-2 btn btn-icon btn-success"
                onclick="return showModalBox('Tambah','{{ route('jenis-potongan.create') }}')">
                <span class="btn-inner--icon">
                    <i class="fas fa-plus"></i>
                </span>
                <span class="btn-inner--text">Tambah</span>
            </button>
        </div>
    </div>
</div>
<div class="table-responsive py-4">
    {!! $table->table(['id' => 'jenis-potongan']) !!}
</div>

{!! $table->scripts() !!}