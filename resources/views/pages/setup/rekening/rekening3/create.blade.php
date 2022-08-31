<form id="rekening3__create" method="POST" action="{{ route('rekening3.store') }}">
    @csrf
    <div class="form-group mb-2">
        <label class="form-control-label mb-0">Rek. Sumber Dana <span class="text-danger">*</span></label>
        <select required name="rekening1_id" class="form-control"></select>
        <input type="hidden" required name="kode1" class="form-control">
    </div>
    <div class="form-group mb-2">
        <label class="form-control-label mb-0">Rek. Kelompok <span class="text-danger">*</span></label>
        <select required name="rekening2_id" class="form-control"></select>
        <input type="hidden" required name="kode2" class="form-control">
    </div>
    <div class="form-group mb-2">
        <label class="form-control-label mb-0">Kode Rekening <span class="text-danger">*</span></label>
        <div class="input-group input-group-merge">
            <div class="input-group-prepend">
                <span id="prefix_kode" class="input-group-text pr-1"></span>
            </div>
            <input type="number" required name="kode3" class="form-control">
        </div>
    </div>
    <div class="form-group mb-3">
        <label class="form-control-label mb-0">Nama Rekening <span class="text-danger">*</span></label>
        <textarea required name="nama" class="form-control"></textarea>
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
    $("[name='rekening1_id']").select2({
        placeholder: "Pilih Rekening Induk...",
        // allowClear: true,
        escapeMarkup: function (m) { return m; },
        ajax: {
            url: "{{ route('rekening1.select') }}",
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
                        return {id: item.id, text: `[${item.kode}] ${item.nama}`, item: item};
                    })
                };
            },
            cache: true
        }
    });
    $("[name='rekening1_id']").on('select2:select', function (e) {
        console.log(e);
        $('[name="kode1"]').val(`${e.params.data.item.kode1}`);
        // rekening 2
        $("[name='kode2']").val(null);
        $("[name='rekening2_id']").val(null);
        $("[name='rekening2_id']").trigger('change.select2');
        $('#prefix_kode').html(null);
    });
</script>
<script>
    $("[name='rekening2_id']").select2({
        placeholder: "Pilih Rekening Induk...",
        // allowClear: true,
        escapeMarkup: function (m) { return m; },
        ajax: {
            url: "{{ route('rekening2.select') }}",
            type: "GET",
            dataType: 'json',
            delay: 250,
            data: function (params) {
                return {
                    search: params.term,
                    rekening1_id: $("[name='rekening1_id']").val()
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
    $("[name='rekening2_id']").on('select2:select', function (e) {
        console.log(e);
        $('[name="kode2"]').val(`${e.params.data.item.kode2}`);
        $('#prefix_kode').html(`${$('[name="kode1"]').val()}.${e.params.data.item.kode2}.`);
    });
</script>
<script>
    $("#rekening3__create").on("submit", function (event) {
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
                $('#rekening3').DataTable().ajax.reload(null, false);
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
