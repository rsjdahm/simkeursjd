<style>
   @page {
      margin: 1.25cm 1.55cm;
      font-family: 'Arial';
      font-size: 10pt;
      font-weight: normal;
      size: 21cm 33cm;
   }

   .checkbox {
      border: 0.5pt solid black;
      width: 100%;
      height: 0.5cm;
   }
</style>

<body>
   <span>SPP-1</span>

   <br />

   <span style="font-size: 13pt; font-weight: bold;">PENELITIAN KELENGKAPAN DOKUMEN SPP</span>

   <br />

   <i>*) coret yang tidak perlu</i>

   <br />
   <br />
   <br />

   1 SPP-GU BLUD

   <table style="width: 100%; text-align: justify; margin: 0.5cm 0 1cm 0;">
      <tr>
         <td style="width: 1.5cm; vertical-align: top;">
            <div class="checkbox"></div>
         </td>
         <td style="width: 0.5cm;"></td>
         <td>Surat Pengantar SPP-GU BLUD</td>
      </tr>
      <tr>
         <td colspan="3"></td>
      </tr>
      <tr>
         <td style="vertical-align: top;">
            <div class="checkbox"></div>
         </td>
         <td></td>
         <td>Ringkasan SPP-GU BLUD</td>
      </tr>
      <tr>
         <td colspan="3"></td>
      </tr>
      <tr>
         <td style="vertical-align: top;">
            <div class="checkbox"></div>
         </td>
         <td></td>
         <td>Rincian SPP-GU BLUD</td>
      </tr>
      <tr>
         <td colspan="3"></td>
      </tr>
      <tr>
         <td style="vertical-align: top;">
            <div class="checkbox"></div>
         </td>
         <td></td>
         <td>Salinan SPD</td>
      </tr>
      <tr>
         <td colspan="3"></td>
      </tr>
      <tr>
         <td style="vertical-align: top;">
            <div class="checkbox"></div>
         </td>
         <td></td>
         <td>Surat Pengesahan Laporan Pertanggungjawaban Bendahara Pengeluaran BLUD atas penggunaan dana SPP-UP/GU/TU
            BLUD Sebelumnya</td>
      </tr>
      <tr>
         <td colspan="3"></td>
      </tr>
      <tr>
         <td style="vertical-align: top;">
            <div class="checkbox"></div>
         </td>
         <td></td>
         <td>Draf Surat Pernyataan untuk ditandatangani oleh Pengguna Anggaran/Kuasa Pengguna Anggaran BLUD yang
            menyatakan bahwa uang yang diminta tidak dipergunakan untuk keperluan selain ganti uang persediaan saat
            pengajuan SP2D kepada Kuasa BUD</td>
      </tr>
      <tr>
         <td colspan="3"></td>
      </tr>
      <tr>
         <td style="vertical-align: top;">
            <div class="checkbox"></div>
         </td>
         <td></td>
         <td>Lampiran lainnya</td>
      </tr>
      <tr>
         <td colspan="3"></td>
      </tr>
   </table>

   PENELITI KELENGKAPAN DOKUMEN SPP

   <table style="width: 100%; text-align: justify; margin: 1cm 0;">
      <tr>
         <td style="width: 3cm;">Tanggal</td>
         <td style="width: 0.5cm;">:</td>
         <td>{{ \Carbon\Carbon::parse($spj_gu->tgl)->isoFormat('d MMMM YYYY') }}</td>
      </tr>
      <tr>
         <td>Nama</td>
         <td>:</td>
         <td></td>
      </tr>
      <tr>
         <td>NIP</td>
         <td>:</td>
         <td></td>
      </tr>
      <tr>
         <td>Tanda Tangan</td>
         <td>:</td>
         <td></td>
      </tr>
   </table>

   <div style="display: block; position: absolute; bottom: 0; left: 0;">
      <table style="width: 100%; text-align: justify; margin: 7cm 0 0 0; font-size: 8pt;">
         <tr>
            <td style="width: 2cm;">Lembar Asli</td>
            <td style="width: 0.1cm;">:</td>
            <td>Untuk Pengguna Anggaran/PPK-SKPD BLUD</td>
         </tr>
         <tr>
            <td>Salinan 1</td>
            <td>:</td>
            <td>Untuk Kuasa BUD</td>
         </tr>
         <tr>
            <td>Salinan 2</td>
            <td>:</td>
            <td>Untuk Bendahara Pengeluaran/PPTK BLUD</td>
         </tr>
         <tr>
            <td>Salinan 3</td>
            <td>:</td>
            <td>Untuk Arsip Bendahara Pengeluaran/PPTK BLUD</td>
         </tr>
      </table>
   </div>
</body>