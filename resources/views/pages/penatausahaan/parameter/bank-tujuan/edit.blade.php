<form id="bank-tujuan__edit" method="POST" action="{{ route('bank-tujuan.update', $item->id) }}">
    @csrf
    @method('PUT')
    <div class="form-group mb-3">
        <label class="form-control-label mb-0">Jenis Bank <span class="text-danger">*</span></label>
        <select required name="jenis_bank_id" class="form-control">
            <option value="{{ $item->jenis_bank_id }}">{{ $item->jenis_bank->nama }}</option>
        </select>
    </div>
    <div class="form-group mb-3">
        <label class="form-control-label mb-0">Nama Rekening Bank <span class="text-danger">*</span></label>
        <input required name="nama" class="form-control" value="{{ $item->nama }}">
    </div>
    <div class="form-group mb-3">
        <label class="form-control-label mb-0">No. Rekening Bank <span class="text-danger">*</span></label>
        <input required name="no_rek" class="form-control" value="{{ $item->no_rek }}">
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
    $("[name='jenis_bank_id']").select2({
        placeholder: "Pilih Jenis Bank...",
        allowClear: true,
        escapeMarkup: function (m) { return m; },
        ajax: {
            url: "{{ route('jenis-bank.select') }}",
            type: "GET",
            dataType: 'json',
            delay: 250,
            data: function (params) {
                return {
                search: params.term,
                };
            },
            processResults: function (response) {
                removeLoader('sm');
                return {
                    results: $.map(response, function(item) {
                        return {id: item.id, text: item.nama};
                    })
                };
            },
            cache: true
        }
    });
</script>
<script>
    $("#bank-tujuan__edit").on("submit", function (event) {
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
                $('#bank-tujuan').DataTable().ajax.reload(null, false);
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