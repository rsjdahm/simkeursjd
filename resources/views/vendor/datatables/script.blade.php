$(function(){window.{{ config('datatables-html.namespace', 'LaravelDataTables') }}=window.{{
config('datatables-html.namespace', 'LaravelDataTables') }}||{};window.{{ config('datatables-html.namespace',
'LaravelDataTables') }}["%1$s"]=$("#%1$s").DataTable(%2$s);});
{{-- $(document).on("init.dt", function(e, settings) {
const api = new $.fn.dataTable.Api(settings);
const inputs = $(settings.nTable).closest(".dataTables_wrapper").find(".dataTables_filter input");
inputs.unbind();
inputs.each(function(e) {
const input = this;
$(input).closest("form").on("keyup keypress", function(e) {
const keyCode = e.keyCode || e.which;
if (keyCode == 13) {
e.preventDefault();
return false;
}
});
$(input).bind("keyup", function(e) {
if (e.keyCode == 13) {
api.search(this.value).draw();
}
});
$(input).bind("input", function(e) {
if (this.value == "") {
api.search(this.value).draw();
}
});
});
}); --}}
$.extend(true, $.fn.dataTable.defaults, {
scrollY: '55vh',
scrollX: true,
scrollCollapse: true,
language: {
processing: `<div class="d-flex flex-row align-items-center justify-content-center"><i
        class="fas fa-spinner fa-spin fa-2x text-primary"></i><small class="ml-3 text-primary">Memuat Data
        SimKeU</small>
</div>`,
{{-- lengthMenu: "_MENU_ data per halaman", --}}
lengthMenu: "_MENU_",
zeroRecords: "Tidak ada data.",
info: "Menampilkan data _START_ - _END_ dari <strong>_TOTAL_</strong>",
infoEmpty: "",
emptyTable: "Tidak ada data pada tabel ini.",
infoFiltered: "Difilter dari total _MAX_ data.",
{{-- search: "Pencarian:", --}}
search: "",
paginate: {
previous: `<i class="fas fa-angle-left">`,
    next: `<i class="fas fa-angle-right">`
        }
        },
        });