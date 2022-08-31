<form id="rekening5__edit" method="POST" action="{{ route('rekening5.update', $item->id) }}">
    @csrf
    @method('PUT')
    <div class="form-group mb-2">
        <label class="form-control-label mb-0">Rek. Sumber Dana <span class="text-danger">*</span></label>
        <select required name="rekening1_id" class="form-control">
            <option value="{{ $item->rekening4->rekening3->rekening2->rekening1_id }}" selected>[{{
                $item->rekening4->rekening3->rekening2->rekening1->kode }}] {{
                $item->rekening4->rekening3->rekening2->rekening1->nama
                }}</option>
        </select>
        <input type="hidden" required name="kode1" class="form-control" value="{{ $item->kode1 }}">
    </div>
    <div class="form-group mb-2">
        <label class="form-control-label mb-0">Rek. Kelompok <span class="text-danger">*</span></label>
        <select required name="rekening2_id" class="form-control">
            <option value="{{ $item->rekening4->rekening3->rekening2_id }}" selected>[{{
                $item->rekening4->rekening3->rekening2->kode }}] {{
                $item->rekening4->rekening3->rekening2->nama
                }}</option>
        </select>
        <input type="hidden" required name="kode2" class="form-control" value="{{ $item->kode2 }}">
    </div>
    <div class="form-group mb-2">
        <label class="form-control-label mb-0">Rek. Jenis <span class="text-danger">*</span></label>
        <select required name="rekening3_id" class="form-control">
            <option value="{{ $item->rekening4->rekening3_id }}" selected>[{{ $item->rekening4->rekening3->kode }}] {{
                $item->rekening4->rekening3->nama
                }}</option>
        </select>
        <input type="hidden" required name="kode3" class="form-control" value="{{ $item->kode3 }}">
    </div>
    <div class="form-group mb-2">
        <label class="form-control-label mb-0">Rek. Objek <span class="text-danger">*</span></label>
        <select required name="rekening4_id" class="form-control">
            <option value="{{ $item->rekening4_id }}" selected>[{{ $item->rekening4->kode }}] {{
                $item->rekening4->nama
                }}</option>
        </select>
        <input type="hidden" required name="kode4" class="form-control" value="{{ $item->kode4 }}">
    </div>
    <div class="form-group mb-2">
        <label class="form-control-label mb-0">Kode Rekening <span class="text-danger">*</span></label>
        <div class="input-group input-group-merge">
            <div class="input-group-prepend">
                <span id="prefix_kode" class="input-group-text pr-1">{{ $item->kode1 }}.{{ $item->kode2 }}.{{
                    $item->kode3 }}.{{
                    str_pad($item->kode4, 2, '0', STR_PAD_LEFT) }}.</span>
            </div>
            <input type="number" required name="kode5" class="form-control" value="{{ $item->kode5 }}">
        </div>
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
        // rekening 3
        $("[name='kode3']").val(null);
        $("[name='rekening3_id']").val(null);
        $("[name='rekening3_id']").trigger('change.select2');
        $('#prefix_kode').html(null);
        // rekening 4
        $("[name='kode4']").val(null);
        $("[name='rekening4_id']").val(null);
        $("[name='rekening4_id']").trigger('change.select2');
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
        // rekening 3
        $("[name='kode3']").val(null);
        $("[name='rekening3_id']").val(null);
        $("[name='rekening3_id']").trigger('change.select2');
        $('#prefix_kode').html(null);
        // rekening 4
        $("[name='kode4']").val(null);
        $("[name='rekening4_id']").val(null);
        $("[name='rekening4_id']").trigger('change.select2');
        $('#prefix_kode').html(null);
    });
</script>
<script>
    $("[name='rekening3_id']").select2({
        placeholder: "Pilih Rekening Induk...",
        // allowClear: true,
        escapeMarkup: function (m) { return m; },
        ajax: {
            url: "{{ route('rekening3.select') }}",
            type: "GET",
            dataType: 'json',
            delay: 250,
            data: function (params) {
                return {
                search: params.term,
                rekening2_id: $("[name='rekening2_id']").val()
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
    $("[name='rekening3_id']").on('select2:select', function (e) {
        console.log(e);
        $('[name="kode3"]').val(`${e.params.data.item.kode3}`);
        // rekening 4
        $("[name='kode4']").val(null);
        $("[name='rekening4_id']").val(null);
        $("[name='rekening4_id']").trigger('change.select2');
        $('#prefix_kode').html(null);
    });
</script>
<script>
    $("[name='rekening4_id']").select2({
        placeholder: "Pilih Rekening Induk...",
        // allowClear: true,
        escapeMarkup: function (m) { return m; },
        ajax: {
            url: "{{ route('rekening4.select') }}",
            type: "GET",
            dataType: 'json',
            delay: 250,
            data: function (params) {
                return {
                    search: params.term,
                    rekening3_id: $("[name='rekening3_id']").val()
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
    $("[name='rekening4_id']").on('select2:select', function (e) {
        console.log(e);
        $('[name="kode4"]').val(`${e.params.data.item.kode4}`);
        $('#prefix_kode').html(`${$('[name="kode1"]').val()}.${$('[name="kode2"]').val()}.${$('[name="kode3"]').val()}.${Number(e.params.data.item.kode4).toString().padStart(2, "0")}.`);
    });
</script>
<script>
    $("#rekening5__edit").on("submit", function (event) {
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
                $('#rekening5').DataTable().ajax.reload(null, false);
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
