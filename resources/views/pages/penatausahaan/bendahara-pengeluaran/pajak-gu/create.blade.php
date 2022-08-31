<form id="pajak-gu__create" method="POST" action="{{ route('pajak-gu.store') }}">
    @csrf
    <input name="bukti_gu_id" type="hidden" value="{{ $bukti_gu->id }}">
    <div class="form-group mb-2">
        <label class="form-control-label mb-0">Potongan <span class="text-danger">*</span></label>
        <select required name="potongan_id" class="form-control"></select>
    </div>
    <div class="form-group mb-2">
        <label class="form-control-label mb-0">Harga Jual <span class="text-danger">*</span></label>
        <input name="harga_jual" class="form-control currency" value="{{ $bukti_gu->nilai }}">
    </div>
    <div class="form-group mb-2">
        <label class="form-control-label mb-0">DPP <span class="text-danger">*</span></label>
        <input name="dpp" class="form-control currency">
    </div>
    <div class="form-group mb-3">
        <label class="form-control-label mb-0">Nilai <span class="text-danger">*</span></label>
        <input name="nilai" class="form-control currency">
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
    $("[name='potongan_id']").on('select2:select', function (e) {
        const selected = e.params.data.item;
        const rumus = selected.perhitungan;

        if(rumus) {
            const harga_jual = $("[name='harga_jual']").val().replace(/\,/g,'');
            let dpp = $("[name='dpp']").val().replace(/\,/g,'');

            const tarif =  selected.tarif;

            const evalRumus = rumus.split('{harga_jual}').join(harga_jual).split('{tarif}').join(tarif).split('{dpp}').join(dpp);
            const nilai = eval(evalRumus);

            if(selected.is_dpp_harga_jual) {
                dpp = harga_jual;
            } else {
                dpp = harga_jual - nilai;
            }

            $("[name='dpp']").val(dpp);
            $("[name='nilai']").val(nilai);
        } else {
            $("[name='dpp']").val(0);
            $("[name='nilai']").val(0);
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
                        return {id: item.id, text: item.nama, item};
                    })
                };
            },
            cache: true
        }
    });
</script>
<script>
    $("#pajak-gu__create").on("submit", function (event) {
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