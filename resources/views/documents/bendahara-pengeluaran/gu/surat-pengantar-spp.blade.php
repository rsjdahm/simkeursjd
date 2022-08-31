<style>
   @page {
      margin: 1.25cm 1.55cm;
      font-family: 'Arial';
      font-size: 10pt;
      font-weight: normal;
      size: 21cm 33cm;
   }

   td {
      vertical-align: top;
   }
</style>

<body>
   <table style="width: 100%; text-align: justify; margin: 0 0 0.5cm 0;">
      <tr>
         <td style="width: 1.75cm;">
            <img src="{{ asset('assets/img/logo-prov.png') }}" style="width: 1.75cm;" />
         </td>
         <td style="text-align: center;">
            <h3 style="font-size: 12pt; margin: 0; padding: 0;">PEMERINTAH PROVINSI KALIMANTAN TIMUR</h3>
            <h2 style="font-size: 14pt; margin: 0; padding: 0;">SURAT PERMINTAAN PEMBAYARAN GANTI UANG (SPP-GU)</h2>
            <h4 style="font-size: 11pt; margin: 0; padding: 0;">Nomor: {{ $spj_gu->no_dokumen_spp }}</h4>
         </td>
      </tr>
   </table>

   <hr style="border: 0.5pt solid black; margin-bottom: 1cm;" />

   <center>
      <span style="font-size: 12pt; font-weight: bold;">SURAT PENGANTAR</span>
   </center>

   <br />

   Kepada Yth.
   <br />
   Pengguna Anggaran/Kuasa Pengguna Anggaran
   <br />
   SKPD <strong>BLUD RSJD ATMA HUSADA MAHAKAM PROV. KALIMANTAN TIMUR</strong>
   <br />
   Di Tempat

   <br />
   <br />

   <p style="text-align: justify">
      Dengan memerhatikan Peraturan Gubernur Kalimantan Timur Nomor 65 Tahun 2015 tentang Penjabaran APBD, bersama ini
      kami mengajukan Surat Permintaan Pembayaran Langsung Barang dan Jasa sebagai berikut:
   </p>

   <table style="width: 100%; text-align: justify; margin: 0.5cm 0 2cm 0;">
      <tr>
         <td style="width: 0.05cm;">
            a.
         </td>
         <td style="width: 3cm;">
            Urusan Pemerintahan
         </td>
         <td style="width: 0.05cm;">
            :
         </td>
         <td style="width: 6cm;">
            <span style="margin-right: 1.3cm;">1.02</span> Urusan Wajib Kesehatan
         </td>
      </tr>
      <tr>
         <td>
            b.
         </td>
         <td>
            SKPD
         </td>
         <td>
            :
         </td>
         <td>
            <span style="margin-right: 0.3cm;">1.02.04.01</span> BLUD RSJD Atma Husada Mahakam
         </td>
      </tr>
      <tr>
         <td>
            c.
         </td>
         <td>
            Tahun Anggaran
         </td>
         <td>
            :
         </td>
         <td>
            {{ \Carbon\Carbon::parse($spj_gu->tgl)->year }}
         </td>
      </tr>
      <tr>
         <td>
            d.
         </td>
         <td>
            Dasar Pengeluaran SPD
         </td>
         <td>
            :
         </td>
         <td>
            DPA BLUD RSJD Atma Husada Mahakam Tahun Anggaran {{ \Carbon\Carbon::parse($spj_gu->tgl)->year }}
         </td>
      </tr>
      <tr>
         <td>
            e.
         </td>
         <td>
            Jumlah Sisa Dana SPD
         </td>
         <td>
            :
         </td>
         <td>
            Rp. 8.254.956.917,00
            <br />
            (terbilang: <i>{{ Str::title(Terbilang::make(8254956917, ' rupiah')) }}</i>)
         </td>
      </tr>
      <tr>
         <td>
            f.
         </td>
         <td>
            Untuk Keperluan
         </td>
         <td>
            :
         </td>
         <td>
            Ganti Uang (GU) pada BLUD Rumah Sakit Jiwa Daerah Atma Husada Mahakam Samarinda
         </td>
      </tr>
      <tr>
         <td>
            g.
         </td>
         <td>
            Nama Bendahara Pengeluaran
         </td>
         <td>
            :
         </td>
         <td>
            Hari Jumadi, A.Md.
         </td>
      </tr>
      <tr>
         <td>
            h.
         </td>
         <td>
            Jumlah Pembayaran yang Diminta
         </td>
         <td>
            :
         </td>
         <td>
            <strong>Rp 267.702.582,00</strong>
            <br />
            (terbilang: <i>{{ Str::title(Terbilang::make(267702582, ' rupiah')) }}</i>)
         </td>
      </tr>
      <tr>
         <td>
            i.
         </td>
         <td>
            Nama dan Nomor Rekening Bank
         </td>
         <td>
            :
         </td>
         <td>
            BANKALTIMTARA / 0011536760
         </td>
      </tr>
   </table>



   <table style="width: 100%; text-align: center; margin: 0;">
      <tr>
         <td style="width: 35%;">
            Mengetahui,
            <br />
            Pejabat Pelaksana Teknis Kegiatan
            <br />
            <br />
            <br />
            <br />
            <strong>H. Bero Utomo, S.Kep, S.Pd.</strong>
            <br />
            NIP. 19750415 199903 1 005
         </td>
         <td style="width: 30%;">
         </td>
         <td style="width: 35%;">
            Samarinda, {{ \Carbon\Carbon::parse($spj_gu->tgl)->isoFormat('d MMMM YYYY') }}
            <br />
            Pelaksana
            <br />
            <br />
            <br />
            <br />
            <strong>Hari Jumadi, A.Md.</strong>
            <br />
            NIP. 19800404 201101 1 001
         </td>
      </tr>
   </table>
   <div style="display: block; position: absolute; bottom: 0; left: 0; font-size: 7pt;">
      SPP - SURAT PENGANTAR
   </div>
</body>