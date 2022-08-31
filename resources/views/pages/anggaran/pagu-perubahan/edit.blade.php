<form id="pagu-murni__edit" method="POST" action="{{ route('pagu-murni.update', $item->id) }}">
    @csrf
    @method('PUT')
    <div class="form-group mb-3">
        [{{ $item->uraian_rekening->rekening6->kode }}] {{ $item->uraian_rekening->rekening6->nama }}
        <br />
        <strong>{{ $item->uraian_rekening->nama }}</strong>
        <input name="uraian_rekening_id" type="hidden" value="{{ $item->uraian_rekening->id }}">
    </div>
    <div class="form-group mb-2">
        <label class="form-control-label mb-0">Nilai Anggaran <span class="text-danger">*</span></label>
        <input name="nilai" class="form-control currency" value="{{ $item->nilai }}">
    </div>
    <div class="form-group text-right">
        <button type="submit" class="btn btn-icon btn-success">
            <span class="btn-inner--icon">
                <i class="fas fa-save"></i>
            </span>
            <span class="btn-inner--text">
                Ubah
            </span>
        </button>
    </div>
</form>

<script>
    $(".currency").inputmask("currency", {
            prefix: "",
            digits: "2",
            autoGroup: true
        });
    $(".currency").each(function () {
        if ($(this).val() == "") {
            $(this).val(0);
        }
    });
</script>
<script>
    $("#pagu-murni__edit").on("submit", function (event) {
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
                console.log(response);
                showNotif("success", "Berhasil!", response.message);
                $('#pagu-murni').DataTable().ajax.reload(null, false);
                $(".modal").modal("hide");
            },
            error: function (xhr) {
                console.log(xhr.responseJSON);
                showNotif("danger", "Request Gagal!", xhr.responseJSON.message);
            }
        });
        return false;
    });
</script>
