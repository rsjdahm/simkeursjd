<form id="bukti-gu__edit" method="POST" action="{{ route('bukti-gu.update', $item->id) }}">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col">
            <div class="form-group mb-2">
                <label class="form-control-label mb-0">Tanggal <span class="text-danger">*</span></label>
                <input type="date" required name="tgl" class="form-control"
                    value="{{ \Carbon\Carbon::parse($item->tgl)->format('Y-m-d') }}">
            </div>
        </div>
        <div class="col">
            <div class="form-group mb-2">
                <label class="form-control-label mb-0">Nomor Bukti <span class="text-danger">*</span></label>
                <input required name="no" class="form-control" value="{{ $item->no }}">
            </div>
        </div>
    </div>
    <div class="form-group mb-2">
        <label class="form-control-label mb-0">Nama Rekanan <span class="text-danger">*</span></label>
        <select required name="rekanan_id" class="form-control">
            <option value="{{ $item?->rekanan_id }}">{{ $item?->rekanan?->nama }}</option>
        </select>
    </div>
    <div class="form-group mb-2">
        <label class="form-control-label mb-0">Rekening</label>
        <select id="rekening6_id" class="form-control">
            <option value="{{ $item?->uraian_rekening?->rekening6_id }}">
                [{{ $item?->uraian_rekening?->rekening6?->kode }}] {{ $item?->uraian_rekening?->rekening6?->nama }}
            </option>
        </select>
    </div>
    <div class="form-group mb-2">
        <label class="form-control-label mb-0">Uraian Rekening</label>
        <select required name="uraian_rekening_id" class="form-control">
            <option value="{{ $item?->uraian_rekening_id }}">
                {{ $item?->uraian_rekening?->nama }}
            </option>
        </select>
    </div>
    <div class="form-group mb-2">
        <label class="form-control-label mb-0">Uraian <span class="text-danger">*</span></label>
        <textarea required name="uraian" class="form-control">{{ $item->uraian }}</textarea>
    </div>
    <div class="form-group mb-3">
        <label class="form-control-label mb-0">Pengeluaran <span class="text-danger">*</span></label>
        <input name="nilai" class="form-control currency" value="{{ $item->nilai }}">
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
    $("[name='rekanan_id']").select2({
        placeholder: "Pilih Rekanan...",
        allowClear: true,
        escapeMarkup: function (m) { return m; },
        ajax: {
            url: "{{ route('rekanan.select') }}",
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
                        return {id: item.id, text: `${item.nama} (${item.nama_pimpinan})`};
                    })
                };
            },
            cache: true
        }
    });
</script>
<script>
    $("#rekening6_id").select2({
        placeholder: "Pilih Rekening...",
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
                        return {id: item.id, text: `[${item.kode}] ${item.nama}`};
                    })
                };
            },
            cache: true
        }
    });
    $("#rekening6_id").on('select2:select', function (e) {
        console.log(e);
        $("[name='uraian_rekening_id']").val(null);
        $("[name='uraian_rekening_id']").trigger('change.select2');
    });
</script>
<script>
    $("[name='uraian_rekening_id']").select2({
        placeholder: "Pilih Uraian Rekening...",
        allowClear: true,
        escapeMarkup: function (m) { return m; },
        ajax: {
            url: "{{ route('uraian-rekening.select') }}",
            type: "GET",
            dataType: 'json',
            delay: 250,
            data: function (params) {
                return {
                    search: params.term,
                    rekening6_id: $('#rekening6_id').val()
                };
            },
            processResults: function (response) {
                removeLoader('sm');
                return {
                    results: $.map(response, function(item) {
                        return {id: item.id, text: `[${item.rekening6.kode}] ${item.nama}`, item};
                    })
                };
            },
            cache: true
        }
    });
</script>
<script>
    $("#bukti-gu__edit").on("submit", function (event) {
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
                $('#bukti-gu').DataTable().ajax.reload(null, false);
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