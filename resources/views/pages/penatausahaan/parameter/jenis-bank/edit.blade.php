<form id="jenis-bank__edit" method="POST" action="{{ route('jenis-bank.update', $item->id) }}">
    @csrf
    @method('PUT')
    <div class="form-group mb-3">
        <label class="form-control-label mb-0">Nama Bank <span class="text-danger">*</span></label>
        <input required name="nama" class="form-control" value="{{ $item->nama }}">
    </div>
    <div class="form-group mb-3">
        <label class="form-control-label mb-0">Kode Bank <span class="text-danger">*</span></label>
        <input required name="kode" class="form-control" value="{{ $item->kode }}">
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
    $("#jenis-bank__edit").on("submit", function (event) {
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
                $('.dataTable').DataTable().ajax.reload(null, false);
                form.closest(".modal").modal("hide");
            },
            error: function (xhr) {
                console.log(xhr.responseJSON);
                showNotif("danger", "Request Gagal!", xhr.responseJSON.message);
            }
        });
        return false;
    });
</script>