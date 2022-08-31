<style>
   @page {
      margin: 1.25cm 1.55cm;
      font-family: 'Arial';
      font-size: 10pt;
      font-weight: normal;
      size: 21cm 33cm;
   }

   .table {
      border-collapse: collapse;
   }

   .table,
   .table td,
   .table th {
      border: 0.5px solid black;
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

   <center>
      <span style="font-size: 12pt; font-weight: bold;">RINGKASAN</span>
   </center>

   <table class="table" style="width: 100%; margin: 0.5cm 0 0 0;">
      <tr>
         <th colspan="5">RINGKASAN DPA-/DPPA-/DPAL-SKPD
         </th>
      </tr>
      <tr>
         <td colspan="3">Jumlah dana DPA-SKPD/DPPA-SKPD/DPAL-SKPD</td>
         <td style="text-align: right; border-right: 0;">18.500.000.000,00</td>
         <td style="text-align: right; width: 0.75cm; border-left: 0;"><strong><i>(I)</i></strong></td>
      </tr>
      <tr>
         <th colspan="5">RINGKASAN SPD</th>
      </tr>
      <tr>
         <th>No. Urut</th>
         <th>Nomor DPA</th>
         <th>Tanggal DPA</th>
         <th colspan="2">Jumlah Dana</th>
      </tr>
      <tr>
         <td style="text-align: center;">1</th>
         <td>1.02.04.01</td>
         <td style="text-align: center;">4 Januari 2022</td>
         <td style="text-align: right; border-right: 0;">18.500.000.000,00</td>
         <td style="text-align: right; width: 0.75cm; border-left: 0;"></td>
      </tr>
   </table>

   <div style="display: block; position: absolute; bottom: 0; left: 0; font-size: 7pt;">
      SPP - RINGKASAN
   </div>
</body>