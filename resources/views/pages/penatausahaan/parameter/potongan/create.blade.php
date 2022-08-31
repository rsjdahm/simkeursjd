<form id="potongan__create" method="POST" action="{{ route('potongan.store') }}">
    @csrf
    <div class="form-group mb-1">
        <label class="form-control-label mb-0">Jenis Potongan <span class="text-danger">*</span></label>
        <select required name="jenis_potongan_id" class="form-control"></select>
    </div>
    <div class="form-group mb-1">
        <label class="form-control-label mb-0">Nama Potongan <span class="text-danger">*</span></label>
        <input required name="nama" class="form-control">
    </div>
    <div class="form-group mb-1">
        <label class="form-control-label mb-0">Kode MAP</label>
        <input name="kode_map" class="form-control">
    </div>
    <div class="form-group mb-1">
        <label class="form-control-label mb-0">Tarif (%)</label>
        <input type="number" name="tarif" class="form-control">
    </div>
    <div class="form-group mb-1">
        <label class="form-control-label mb-0">Rumus Perhitungan</label>
        <div class="d-block mb-1 border border-gray p-2 rounded">
            <strong>Variabel yang dapat digunakan :</strong><br />
            <code>{dpp}</code>
            <code>{harga_jual}</code>
            <code>{tarif}</code>
        </div>
        <textarea name="perhitungan" class="form-control"></textarea>
    </div>
    <div class="form-group mb-1">
        <label class="form-control-label mb-0">DPP = Harga Jual? <span class="text-danger">*</span></label>
        <select required name="is_dpp_harga_jual" class="form-control">
            <option value="0">Tidak</option>
            <option value="1">Iya</option>
        </select>
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
    $("[name='jenis_potongan_id']").select2({
        placeholder: "Pilih Jenis Potongan...",
        allowClear: true,
        escapeMarkup: function (m) { return m; },
        ajax: {
            url: "{{ route('jenis-potongan.select') }}",
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
    $("#potongan__create").on("submit", function (event) {
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
                $('#potongan').DataTable().ajax.reload(null, false);
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
