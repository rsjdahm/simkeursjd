<div class="card-header">
    <div class="row align-items-center">
        <div class="col-md-8 px-0">
            <p>[{{ $bukti_gu->uraian_rekening->rekening6->kode }}] {{ $bukti_gu->uraian_rekening->rekening6->nama }}</p>
        </div>
        <div class="col-md-4 text-right">
            <button type="button" class="mt-2 btn btn-icon btn-success"
                onclick="return showModalBox('Tambah Potongan Pajak','{{ route('pajak-gu.create', ['bukti_gu' => $bukti_gu->id]) }}')">
                <span class="btn-inner--icon">
                    <i class="fas fa-plus"></i>
                </span>
                <span class="btn-inner--text">Tambah</span>
            </button>
        </div>
        <p class="text-sm mb-0">
            {{ $bukti_gu->uraian }}
        </p>
    </div>

</div>
<div class="table-responsive py-4">
    {!! $table->table(['id' => 'pajak-gu'], true) !!}
</div>

{!! $table->scripts() !!}