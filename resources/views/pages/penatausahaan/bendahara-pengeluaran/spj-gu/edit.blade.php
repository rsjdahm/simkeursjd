<form id="spj-gu__edit" method="POST" action="{{ route('spj-gu.update', $item->id) }}">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col">
            <div class="form-group mb-2">
                <label class="form-control-label mb-0">Tanggal <span class="text-danger">*</span></label>
                <input type="date" required name="tgl" class="form-control" value="{{ $item->tgl }}">
            </div>
        </div>
        <div class="col">
            <div class="form-group mb-2">
                <label class="form-control-label mb-0">Nomor SPJ <span class="text-danger">*</span></label>
                <input required name="no" class="form-control" value="{{ $item->no }}">
            </div>
        </div>
    </div>
    <div class="form-group text-right">
        <button type="submit" class="btn btn-icon btn-success">
            <span class="btn-inner--icon">
                <i class="fas fa-save"></i>
            </span>
            <span class="btn-inner--text">
                Simpan
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
    $("#spj-gu__edit").on("submit", function (event) {
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
                $('#spj-gu').DataTable().ajax.reload(null, false);
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