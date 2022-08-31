<!-- AJAX -->
<script>
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    NProgress.configure({ showSpinner: false });
</script>

<!-- Notification -->
<script>
    function notify(type, title, message) {
       $.notify({
           icon: 'notifications',
           title,
           message,
       }, {
           type: type,
           timer: 1000,
           z_index: 10000,
           placement: {
               from: "top",
               align: "center"
           },
           template: '<div data-notify="container" class="col-11 col-md-4 alert alert-{0}" role="alert"><button type="button" aria-hidden="true" class="close" data-notify="dismiss"><i class="material-icons">close</i></button><i data-notify="icon" class="material-icons"></i><span class="font-weight-bold text-uppercase" data-notify="title">{1}</span> <span data-notify="message">{2}</span><div class="progress" data-notify="progressbar"><div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div></div><a href="{3}" target="{4}" data-notify="url"></a></div>'
       });
   }
</script>

<!-- Load Page -->
<script>
    function load(url, container) {
        $.ajax({
            url: url,
            success: function(response) {
                $(container ? container : "#app").html(response);
                $('[data-toggle="select"]').select2();
            },
            error: function (xhr) {
                notify("danger", "Loading Gagal!", xhr.responseJSON.message);
            },
        });
    }
    $(document).ready(function() {
        load($('meta[name="auth-url"]').attr("content"));
    }); 
</script>

<!-- Load Modal -->
<script>
    function modal(title, url, size)
    {
        const id = Math.floor(Math.random() * 1000) + 1;
        $(".modal.fade").not(".modal.fade.show").remove();
        $("body").append(`<div id="modal_${id}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true"><div class="modal-dialog modal-dialog-centered ${size ? `modal-${size}` : ""}" role="document"><div class="modal-content"><div class="modal-header"><h6 class="modal-title">${title}</h6><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="material-icons">close</i></span></button></div><div id="modal-body_${id}" class="modal-body"></div></div></div></div>`);
        $("#modal_" + id).modal("toggle");
        load(url, '#modal-body_' + id);
    }
    function modalPdf(title, url)
    {
        const id = Math.floor(Math.random() * 1000) + 1;
        $(".modal.fade").not(".modal.fade.show").remove();
        $("body").append(`<div id="modal_${id}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true"><div class="modal-dialog modal-dialog-centered modal-xl" role="document"><div class="modal-content" style="height: 90vh;"><div class="modal-header"><h6 class="modal-title">${title}</h6><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="material-icons">close</i></span></button></div><div class="modal-body p-0"><object data="${url}" type="application/pdf" width="100%" height="100%"><p>Download PDF <a href="${url}">Klik Di Sini</a></p></object></div></div></div></div>`);
        $("#modal_" + id).modal("toggle");
        }
</script>

<!-- Switch Menu -->
<script>
    function switchMenu(obj) {
        $(".nav-link.active").removeClass("active");
        $(obj).toggleClass("active");
    }    
</script>


<!-- Belum dirapihin -->

<!-- End Scripts -->
<script>
    // pengaturan ajax
    $(document)
        .ajaxStart(function () {
            NProgress.start();
            $("fieldset").attr("disabled", "disabled");
        })
        .ajaxComplete(function () {
            NProgress.done();
            $("fieldset").removeAttr("disabled");
        })
        .ajaxError(function (event, xhr, settings, thrownError) {
            NProgress.done();
            var message = xhr?.responseJSON?.message
                ? xhr.responseJSON.message
                : JSON.stringify(xhr);
            var type = "danger";

            if (xhr.status == 422) {
                var iter = 0;
                message = "<li>";
                type = "danger";
                title = "Request Tidak Valid";

                $("form")
                    .find("input, select, textarea")
                    .closest(".input-group")
                    .removeClass("border border-danger text-danger");

                $("form")
                    .find("input, select, textarea")
                    .closest(".form-group")
                    .removeClass("border border-danger text-danger");

                $("form").find(".error-validation").remove();

                $.each(xhr.responseJSON.errors, function (name, messages) {
                    if (iter) {
                        message += "<li>";
                    }
                    message += messages.join("</li>");
                    iter++;
                    if (name.includes(".")) {
                        name = name.split(".");

                        if (name.length < 3) {
                            const inputField = $('[name^="' + name[0] + '[]"]');
                            const parentField = inputField.closest(".input-group");
                            if (parentField.length > 0) {
                                parentField
                                    .addClass("border border-danger text-danger")
                                    .closest(".form-group")
                                    .append(
                                        `<small class="text-danger error-validation">${messages}</small>`
                                    );
                            } else {
                                inputField
                                    .addClass("border border-danger text-danger")
                                    .closest(".form-group")
                                    .append(
                                        `<small class="text-danger error-validation">${messages}</small>`
                                    );
                            }
                            // $('.select2[name^="' + name[0] + '[]"]')
                            //     .next(".select2")
                            //     .addClass("border border-danger text-danger");
                        } else {
                            const inputField = $(
                                '[name^="' +
                                    name[0] +
                                    "[" +
                                    name[1] +
                                    "][" +
                                    name[2] +
                                    ']"]'
                            );
                            const parentField = inputField.closest(".input-group");

                            if (parentField.length > 0) {
                                parentField
                                    .addClass("border border-danger text-danger")
                                    .closest(".form-group")
                                    .append(
                                        `<small class="text-danger error-validation">${messages}</small>`
                                    );
                            } else {
                                inputField
                                    .addClass("border border-danger text-danger")
                                    .closest(".form-group")
                                    .append(
                                        `<small class="text-danger error-validation">${messages}</small>`
                                    );
                            }
                        }
                    } else {
                        const inputField = $('[name="' + name + '"]');
                        const parentField = inputField.closest(".input-group");
                        if (parentField.length > 0) {
                            parentField
                                .addClass("border border-danger")
                                .closest(".form-group")
                                .append(
                                    `<small class="text-danger error-validation">${messages}</small>`
                                );
                        } else {
                            inputField
                                .addClass("border border-danger")
                                .closest(".form-group")
                                .append(
                                    `<small class="text-danger error-validation">${messages}</small>`
                                );
                        }
                    }
                });
                message += "</ul>";
            } else if (xhr.status == 401 || xhr.status == 419) {
                message =
                    "Sesi login habis, silakan muat ulang browser Anda dan login kembali.";
                type = "warning";
                title = "Aplikasi Error";
                $(".modal").modal("hide");

                notify(type, title, message);
            } else if (xhr.status == 500) {
                message =
                    "Terjadi kesalahan, silakan muat ulang browser Anda dan hubungi Admin." +
                    "<br /><br />" +
                    "<i>" +
                    xhr.responseJSON.message +
                    "</i>";
                type = "danger";
                title = "Aplikasi Error";
                $(".modal").modal("hide");

                notify(type, title, message);
            }
        });
</script>