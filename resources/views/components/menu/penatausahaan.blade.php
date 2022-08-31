<li class="nav-item">
    <a href={{ route('dashboard') }} class="nav-link  active">
        <i class="fas fa-home text-primary"></i>
        <span class="nav-link-text">Dashboard</span>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link" href="#sidebar__2_1" data-toggle="collapse" role="button" aria-expanded="false"
        aria-controls="sidebar__2_1">
        <i class="fas fa-qrcode text-success"></i>
        <span class="nav-link-text">Parameter</span>
    </a>
    <div class="collapse" id="sidebar__2_1">
        <ul class="nav nav-sm flex-column">
            <li class="nav-item">
                <a href="javascript:void(0)" onclick="loadPage('{{ route('potongan.index') }}');switchMenu(this);"
                    class="nav-link">
                    <i class="fas fa-cut text-gray"></i>
                    Potongan Pajak</a>
            </li>
            <li class="nav-item">
                <a href="javascript:void(0)" onclick="loadPage('{{ route('bank-tujuan.index') }}');switchMenu(this);"
                    class="nav-link">
                    <i class="fas fa-university text-gray"></i>
                    Bank Tujuan
                </a>
            </li>
            <li class="nav-item">
                <a href="javascript:void(0)" onclick="loadPage('{{ route('rekanan.index') }}');switchMenu(this);"
                    class="nav-link">
                    <i class="fas fa-briefcase text-gray"></i>
                    Data Rekanan
                </a>
            </li>
        </ul>
    </div>
</li>
<li class="nav-item">
    <a class="nav-link" href="#sidebar__2_4" data-toggle="collapse" role="button" aria-expanded="false"
        aria-controls="sidebar__2_4">
        <i class="fas fa-calculator text-pink"></i>
        <span class="nav-link-text">Bend. Penerimaan</span>
    </a>
    <div class="collapse" id="sidebar__2_4">
        <ul class="nav nav-sm flex-column">
            <li class="nav-item">
                <a href="javascript:void(0)" onclick="loadPage('{{ route('potongan.index') }}');switchMenu(this);"
                    class="nav-link">
                    <i class="fas fa-book text-gray"></i>
                    BKU</a>
            </li>
        </ul>
    </div>
</li>
<li class="nav-item">
    <a class="nav-link" href="#sidebar__2_2" data-toggle="collapse" role="button" aria-expanded="false"
        aria-controls="sidebar__2_2">
        <i class="fas fa-donate text-info"></i>
        <span class="nav-link-text">Bend. Pengeluaran</span>
    </a>
    <div class="collapse" id="sidebar__2_2">
        <ul class="nav nav-sm flex-column">
            <li class="nav-item">
                <a class="nav-link" href="#menu_gu" data-toggle="collapse" role="button" aria-expanded="false"
                    aria-controls="menu_gu">
                    <i class="fas fa-donate text-info"></i>
                    <span class="nav-link-text">GU</span>
                </a>
                <div class="collapse" id="menu_gu">
                    <ul class="nav nav-sm flex-column">
                        <li class="nav-item">
                            <a href="javascript:void(0)"
                                onclick="loadPage('{{ route('sp2d-gu.index') }}');switchMenu(this);" class="nav-link">
                                <i class="fas fa-file text-gray"></i>
                                SP2D GU
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="javascript:void(0)"
                                onclick="loadPage('{{ route('bukti-gu.index') }}');switchMenu(this);" class="nav-link">
                                <i class="fas fa-file-alt text-gray"></i>
                                Bukti Traksaksi GU
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="javascript:void(0)"
                                onclick="loadPage('{{ route('spj-gu.index') }}');switchMenu(this);" class="nav-link">
                                <i class="fas fa-file text-gray"></i>
                                SPJ GU
                            </a>
                        </li>
                        {{-- <li class="nav-item">
                            <a href="../../pages/components/typography.html" class="nav-link">Buku
                                Pajak</a>
                        </li> --}}
                    </ul>
                </div>
            </li>
            {{-- <li class="nav-item">
                <a href="javascript:void(0)" onclick="loadPage('{{ route('bukti-gu.index') }}');switchMenu(this);"
                    class="nav-link">
                    <i class="fas fa-file-alt text-gray"></i>
                    Bukti Traksaksi GU
                </a>
            </li>
            <li class="nav-item">
                <a href="javascript:void(0)" onclick="loadPage('{{ route('bukti-gu.index') }}');switchMenu(this);"
                    class="nav-link">
                    <i class="fas fa-file text-gray"></i>
                    SPJ GU
                </a>
            </li> --}}
            <li class="nav-item">
                <a href="../../pages/components/typography.html" class="nav-link">Buku
                    Pajak</a>
            </li>
        </ul>
    </div>
</li>
<li class="nav-item">
    <a class="nav-link" href="#sidebar__2_3" data-toggle="collapse" role="button" aria-expanded="false"
        aria-controls="sidebar__2_3">
        <i class="fas fa-calculator text-pink"></i>
        <span class="nav-link-text">Laporan</span>
    </a>
    <div class="collapse" id="sidebar__2_3">
        <ul class="nav nav-sm flex-column">
            <li class="nav-item">
                <a class="nav-link" href="#sidebar__2_3_1" data-toggle="collapse" role="button" aria-expanded="false"
                    aria-controls="sidebar__2_3_1">
                    <i class="fas fa-donate text-gray"></i>
                    <span class="nav-link-text">Bend. Pengeluaran</span>
                </a>
                <div class="collapse" id="sidebar__2_3_1">
                    <ul class="nav nav-sm flex-column">
                        <li class="nav-item">
                            <a href="../../pages/components/typography.html" class="nav-link">Dokumen
                                Kendali</a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</li>