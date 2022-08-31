<form id="rekening1__edit" method="POST" action="{{ route('rekening1.update', $item->id) }}">
    @csrf
    @method('PUT')
    <div class="form-group mb-2">
        <label class="form-control-label mb-0">Kode Rekening <span class="text-danger">*</span></label>
        <input type="number" required name="kode1" class="form-control" value="{{ $item->kode1 }}">
    </div>
    <div class="form-group mb-3">
        <label class="form-control-label mb-0">Nama Rekening <span class="text-danger">*</span></label>
        <textarea required name="nama" class="form-control">{{ $item->nama }}</textarea>
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
    $("#rekening1__edit").on("submit", function (event) {
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
                $('#rekening1').DataTable().ajax.reload(null, false);
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
