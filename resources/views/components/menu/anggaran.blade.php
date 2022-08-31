<li class="nav-item">
    <a href={{ route('dashboard') }} class="nav-link  active">
        <i class="fas fa-home text-primary"></i>
        <span class="nav-link-text">Dashboard</span>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link" href="#sidebar_item_1" data-toggle="collapse" role="button" aria-expanded="false"
        aria-controls="sidebar_item_1">
        <i class="fas fa-wrench text-success"></i>
        Setup Rekening</a>
    </a>
    <div class="collapse" id="sidebar_item_1">
        <ul class="nav nav-sm flex-column">
            <li class="nav-item">
                <a href="javascript:void(0)" onclick="loadPage('{{ route('rekening1.index') }}');switchMenu(this);"
                    class="nav-link">
                    <i class="fas fa-angle-double-right text-gray"></i>
                    Rek. Struktur
                </a>
            </li>
            <li class="nav-item">
                <a href="javascript:void(0)" onclick="loadPage('{{ route('rekening2.index') }}');switchMenu(this);"
                    class="nav-link">
                    <i class="fas fa-angle-double-right text-gray"></i>
                    Rek. Kelompok
                </a>
            </li>
            <li class="nav-item">
                <a href="javascript:void(0)" onclick="loadPage('{{ route('rekening3.index') }}');switchMenu(this);"
                    class="nav-link">
                    <i class="fas fa-angle-double-right text-gray"></i>
                    Rek. Jenis
                </a>
            </li>
            <li class="nav-item">
                <a href="javascript:void(0)" onclick="loadPage('{{ route('rekening4.index') }}');switchMenu(this);"
                    class="nav-link">
                    <i class="fas fa-angle-double-right text-gray"></i>
                    Rek. Objek
                </a>
            </li>
            <li class="nav-item">
                <a href="javascript:void(0)" onclick="loadPage('{{ route('rekening5.index') }}');switchMenu(this);"
                    class="nav-link">
                    <i class="fas fa-angle-double-right text-gray"></i>
                    Rek. Rincian Objek
                </a>
            </li>
            <li class="nav-item">
                <a href="javascript:void(0)" onclick="loadPage('{{ route('rekening6.index') }}');switchMenu(this);"
                    class="nav-link">
                    <i class="fas fa-angle-double-right text-gray"></i>
                    Rek. Sub Rincian Objek
                </a>
            </li>
        </ul>
    </div>
</li>

<li class="nav-item">
    <a href="javascript:void(0)" onclick="loadPage('{{ route('uraian-rekening.index') }}');switchMenu(this);"
        class="nav-link">
        <i class="fas fa-toolbox text-pink"></i>
        Uraian Rekening
    </a>
</li>
<li class="nav-item">
    <a class="nav-link" href="#sidebar_item_2" data-toggle="collapse" role="button" aria-expanded="false"
        aria-controls="sidebar_item_2">
        <i class="fas fa-edit text-info"></i>
        <span class="nav-link-text">Penganggaran</span>
    </a>
    <div class="collapse" id="sidebar_item_2">
        <ul class="nav nav-sm flex-column">
            <li class="nav-item">
                <a class="nav-link" href="#sidebar_item_2_1" data-toggle="collapse" role="button" aria-expanded="false"
                    aria-controls="sidebar_item_2_1">
                    <i class="fas fa-file-invoice-dollar text-gray"></i>
                    <span class="nav-link-text">Belanja</span>
                </a>
                <div class="collapse" id="sidebar_item_2_1">
                    <ul class="nav nav-sm flex-column">
                        <li class="nav-item">
                            <a href="javascript:void(0)"
                                onclick="loadPage('{{ route('pagu-murni.index') }}');switchMenu(this);"
                                class="nav-link">
                                <i class="fas fa-search-dollar text-gray"></i>
                                Pagu Murni
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="javascript:void(0)"
                                onclick="loadPage('{{ route('pagu-perubahan.index') }}');switchMenu(this);"
                                class="nav-link">
                                <i class="fas fa-hand-holding-usd text-gray"></i>
                                Pagu Perubahan
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</li>
