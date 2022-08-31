<form id="rekanan__edit" method="POST" action="{{ route('rekanan.update', $rekanan->id) }}">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-md-6">
            <div class="form-group mb-2">
                <label class="form-control-label mb-0">Bentuk Usaha <span class="text-danger">*</span></label>
                <select required name="bentuk_rekanan_id" class="form-control">
                    <option value="{{ $rekanan->bentuk_rekanan_id }}">{{ $rekanan->bentuk_rekanan->nama }}</option>
                </select>
            </div>
            <div class="form-group mb-2">
                <label class="form-control-label mb-0">Nama Rekanan <span class="text-danger">*</span></label>
                <input required name="nama" class="form-control" value="{{ $rekanan->nama }}">
            </div>
            <div class="form-group mb-2">
                <label class="form-control-label mb-0">NPWP</label>
                <input name="npwp" class="form-control" value="{{ $rekanan->npwp }}">
            </div>
            <div class="form-group mb-2">
                <label class="form-control-label mb-0">Alamat Rekanan <span class="text-danger">*</span></label>
                <textarea required name="alamat" class="form-control">{{ $rekanan->alamat }}</textarea>
            </div>
            <div class="form-group mb-2">
                <label class="form-control-label mb-0">Nama Pimpinan <span class="text-danger">*</span></label>
                <input required name="nama_pimpinan" class="form-control" value="{{ $rekanan->nama_pimpinan }}">
            </div>
            <div class="form-group mb-2">
                <label class="form-control-label mb-0">No. Telepon</label>
                <input name="no_telp" class="form-control" value="{{ $rekanan->no_telp }}">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group mb-2">
                <label class="form-control-label mb-0">Nama Bank <span class="text-danger">*</span></label>
                <select required name="jenis_bank_id" class="form-control">
                    <option value="{{ $rekanan->jenis_bank_id }}">{{ $rekanan->jenis_bank?->nama }}</option>
                </select>
            </div>
            <div class="form-group mb-2">
                <label class="form-control-label mb-0">Nama Rekening <span class="text-danger">*</span></label>
                <input required name="nama_rek" class="form-control" value="{{ $rekanan->nama_rek }}">
            </div>
            <div class="form-group mb-2">
                <label class="form-control-label mb-0">No. Rekening <span class="text-danger">*</span></label>
                <input required name="no_rek" class="form-control" value="{{ $rekanan->no_rek }}">
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
    $("[name='jenis_bank_id']").select2({
        placeholder: "Pilih Bank...",
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
    $("[name='bentuk_rekanan_id']").select2({
        placeholder: "Pilih Bentuk Usaha...",
        allowClear: true,
        escapeMarkup: function (m) { return m; },
        ajax: {
            url: "{{ route('bentuk-rekanan.select') }}",
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
    $("#rekanan__edit").on("submit", function (event) {
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
                $('#rekanan').DataTable().ajax.reload(null, false);
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