<footer class="footer p-3">
    <div class="row flex-column flex-lg-row align-items-center justify-content-lg-between">
        <div>
            <div class="copyright text-center text-lg-left text-muted">
                Copyright &copy; {{ date('Y') }} <a href="{{ url('/') }}" class="font-weight-bold ml-1">RSJD
                    Atma Husada Mahakam</a>
            </div>
        </div>
        <button type="button" class="mt-2 btn btn-icon btn-sm btn-warning"
            onclick="return showModalBox('Versi Rilisan Aplikasi','{{ route('versioning') }}','lg')">
            <span class="btn-inner--icon">
                <i class="fas fa-thumbs-up"></i>
            </span>
            <span class="btn-inner--text">V0.1-alpha</span>
        </button>
    </div>
</footer>
