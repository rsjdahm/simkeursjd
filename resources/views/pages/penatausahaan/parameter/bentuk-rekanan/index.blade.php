<div class="card-header">
    <div class="row align-items-center">
        <div class="col-md-8">
            <h3 class="mb-0">Bentuk Usaha</h3>
        </div>
        <div class="col-md-4 text-right">
            <button type="button" class="mt-2 btn btn-icon btn-success"
                onclick="return showModalBox('Tambah','{{ route('bentuk-rekanan.create') }}')">
                <span class="btn-inner--icon">
                    <i class="fas fa-plus"></i>
                </span>
                <span class="btn-inner--text">Tambah</span>
            </button>
        </div>
    </div>

</div>
<div class="table-responsive py-4">
    {!! $table->table(['id' => 'bentuk-rekanan']) !!}
</div>

{!! $table->scripts() !!}