<form id="pajak-gu__edit" method="POST" action="{{ route('pajak-gu.update', $pajak_gu->id) }}">
    @csrf
    @method('PUT')
    <input name="bukti_gu_id" type="hidden" value="{{ $pajak_gu->bukti_gu_id }}">
    <div class="form-group mb-2">
        <label class="form-control-label mb-0">Potongan <span class="text-danger">*</span></label>
        <select required name="potongan_id" class="form-control">
            <option value="{{ $pajak_gu->potongan_id }}">{{ $pajak_gu->potongan->nama }}</option>
        </select>
    </div>
    <div class="form-group mb-2">
        <label class="form-control-label mb-0">DPP <span class="text-danger">*</span></label>
        <input name="dpp" class="form-control currency" value="{{ $pajak_gu->dpp }}">
    </div>
    <div class="form-group mb-3">
        <label class="form-control-label mb-0">Nilai <span class="text-danger">*</span></label>
        <input name="nilai" class="form-control currency" value="{{ $pajak_gu->nilai }}">
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
    $("[name='potongan_id']").select2({
        placeholder: "Pilih Potongan...",
        allowClear: true,
        escapeMarkup: function (m) { return m; },
        ajax: {
            url: "{{ route('potongan.select') }}",
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
    $("#pajak-gu__edit").on("submit", function (event) {
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