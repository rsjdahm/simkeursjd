<form id="bukti-gu__create" method="POST" action="{{ route('bukti-gu.store') }}">
    @csrf
    <div class="row">
        <div class="col">
            <div class="form-group mb-2">
                <label class="form-control-label mb-0">Tanggal <span class="text-danger">*</span></label>
                <input type="date" onchange="getUraian()" required name="tgl" class="form-control"
                    value="{{ now()->format('Y-m-d') }}">
            </div>
        </div>
        <div class="col">
            <div class="form-group mb-2">
                <label class="form-control-label mb-0">Nomor Cek <span class="text-danger">*</span></label>
                <input required name="no" onkeyup="getUraian()" class="form-control" value="Cek No. ">
            </div>
        </div>
    </div>
    <div class="form-group mb-2">
        <label class="form-control-label mb-0">No. SP2D <span class="text-danger">*</span></label>
        <input required name="no_sp2d" onkeyup="getUraian()" class="form-control" value="">
    </div>
    <div class="form-group mb-2">
        <label class="form-control-label mb-0">Uraian <span class="text-danger">*</span></label>
        <textarea required name="uraian" class="form-control"></textarea>
    </div>
    <div class="row">
        <div class="col">
            <div class="form-group mb-2">
                <label class="form-control-label mb-0">Penerimaan <span class="text-danger">*</span></label>
                <input name="debit" class="form-control currency">
            </div>
        </div>
        <div class="col">
            <div class="form-group mb-3">
                <label class="form-control-label mb-0">Pengeluaran <span class="text-danger">*</span></label>
                <input readonly name="kredit" class="form-control currency">
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
    function getUraian() {
        if($('[name="tgl"]').val() && $('[name="no"]').val() && $('[name="no_sp2d"]').val()) {
            $('[name="uraian"]').html(`Terima SP2D Ganti Uang (GU) No. ${$('[name="no_sp2d"]').val()} Tgl. ${$('[name="tgl"]').val()} dan dengan ${$('[name="no"]').val()}`);
        }
    }
    getUraian();
</script>
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
                        return {id: item.id, text: `${item.nama}`};
                    })
                };
            },
            cache: true
        }
    });
</script>
<script>
    $("#bukti-gu__create").on("submit", function (event) {
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
