<form id="uraian-rekening__edit" method="POST" action="{{ route('uraian-rekening.update', $item->id) }}">
    @csrf
    @method('PUT')
    <div class="form-group mb-3">
        <label class="form-control-label mb-0">Indukan Rekening</label>
        <select name="rekening6_id" class="form-control">
            <option value="{{ $item->rekening6_id }}" selected="selected">[{{
                $item->rekening6->kode }}] {{ $item->rekening6->nama }}</option>
        </select>
    </div>
    <div class="form-group mb-3">
        <label class="form-control-label mb-0">Uraian <span class="text-danger">*</span></label>
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
    $("[name='rekening6_id']").select2({
        placeholder: "Pilih Rekening Induk...",
        allowClear: true,
        escapeMarkup: function (m) { return m; },
        ajax: {
            url: "{{ route('rekening6.select') }}",
            type: "GET",
            dataType: 'json',
            delay: 250,
            data: function (params) {
                return {
                    search: params.term
                };
            },
            processResults: function (response) {
                removeLoader('sm');
                return {
                    results: $.map(response, function(item) {
                        return {id: item.id, text: `[${item.kode}] ${item.nama}`, item: item};
                    })
                };
            },
            cache: true
        }
    });
</script>
<script>
    $("#uraian-rekening__edit").on("submit", function (event) {
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
                $('#uraian-rekening').DataTable().ajax.reload(null, false);
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
