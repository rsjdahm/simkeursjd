<x-guest-layout>

    <form id="loginForm" method="POST" action="{{ route('login') }}">
        <fieldset>
            @csrf
            <input type="hidden" value="true" name="remember">
            <div id="card-login" class="card card-login">
                <div class="card-header card-header-info text-center">
                    <table>
                        <tr>
                            <td width="90">
                                <img height="50" class="mr-3" src="{{ asset('assets/img/logo.png') }}">
                            </td>
                            <td>
                                <h3 class="card-title mb-0">SIMKEU BLUD</h3>
                                <small class="card-title mt-0">RSJD ATMA HUSADA MAHAKAM</small>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="card-body ">
                    <span class="bmd-form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="material-icons">badge</i>
                                </span>
                            </div>
                            <input required type="text" name="username" class="form-control"
                                placeholder="Username..." />
                        </div>
                    </span>
                    <span class="bmd-form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="material-icons">lock</i>
                                </span>
                            </div>
                            <input required type="password" name="password" class="form-control"
                                placeholder="Password..." />
                        </div>
                    </span>
                </div>
                <div class="card-footer justify-content-center">
                    <button type="submit" class="btn btn-success"><i class="material-icons">login</i> Login</button>
                </div>
                <p style="text-align: center;">Belum punya akun? <a href="javascript:void(0)"
                        onclick="pengajuan_panel()">Administrator</a></p>
                <a style="text-align: center; margin-bottom: 5px; margin-top: -20px;" href="javascript:void(0)"
                    onclick="lupa_password()">Lupa Password</a>
            </div>
        </fieldset>
    </form>

    <script>
        $("#loginForm").on("submit", function (event) {
            event.preventDefault();
            var form = $(this);
            var formData = new FormData($(this)[0]);
            $.ajax({
                url: form.attr("action"),
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    notify("success", "Login Berhasil", "Apabila terdapat masalah silakan hubungi Administrator.");
                    return load(response);
                },
                error: function (xhr) {
                    notify("danger", "Login Gagal!", xhr.responseJSON.message);
                }
            });
            return false;
        });
    </script>
</x-guest-layout>