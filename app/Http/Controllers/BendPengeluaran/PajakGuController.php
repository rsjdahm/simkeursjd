<?php

namespace App\Http\Controllers\BendPengeluaran;

use App\Http\Controllers\Controller;
use App\Http\Requests\BendPengeluaran\PajakGuRequest;
use App\Models\BuktiGu;
use App\Models\PajakGu;
use Yajra\DataTables\Facades\DataTables;
use Yajra\DataTables\Html\Builder;

class PajakGuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Builder $builder, BuktiGu $bukti_gu)
    {
        if (request()->wantsJson()) {
            return DataTables::of(
                PajakGu::where('bukti_gu_id', $bukti_gu->id)
                    ->get()
            )
                ->addIndexColumn()
                ->editColumn('npwp', function ($item) {
                    if ($item->npwp) {
                        return $item->npwp;
                    }
                    return '-';
                })
                ->addColumn('action', function ($item) {
                    return '<button title="Hapus - ID ' . $item->id . '" onclick="return deleteData(\'' . route('pajak-gu.destroy', $item->id) . '\', [\'#pajak-gu\', \'#bukti-gu\'])" type="button" class="btn btn-sm btn-danger btn-icon-only mr-1 rounded-circle">
                      <span class="btn-inner--icon"><i style="font-size: 10px" class="fas fa-trash"></i></span>
                    </button>
                    <button title="Ubah - ID ' . $item->id . '" onclick="return showModalBox(\'Edit Bukti GU\',\'' . route('pajak-gu.edit', $item->id) . '\')"  type="button" class="btn btn-sm btn-warning btn-icon-only mr-1 rounded-circle">
                      <span class="btn-inner--icon"><i style="font-size: 10px" class="fas fa-edit"></i></span>
                    </button>';
                })
                ->make(true);
        }

        $table = $builder->ajax(route('pajak-gu.index', ['bukti_gu' => $bukti_gu->id]))
            ->dom('brtp')
            ->addAction(['title' => '', 'style' => 'width: 1%;'])
            ->addIndex(['title' => 'No', 'style' => 'width: 1%;', 'class' => 'text-center'])
            ->addColumn(['data' => 'potongan.nama', 'title' => 'Jenis Pajak',  'class' => 'text-wrap'])
            ->addColumn(['data' => 'bukti_gu.rekanan.nama', 'title' => 'Wajib Pajak (Rekanan)', 'class' => 'text-wrap'])
            ->addColumn(['data' => 'bukti_gu.rekanan.npwp', 'title' => 'NPWP (Rekanan)', 'class' => 'text-center'])
            ->addColumn(['data' => 'dpp', 'title' => 'DPP (Rp)', 'class' => 'text-nowrap text-right', 'footer' => 'Jumlah Potongan Pajak : '])
            ->addColumn(['data' => 'nilai', 'title' => 'Pajak (Rp)', 'class' => 'text-nowrap text-right'])->parameters([
                "columnDefs" => [
                    [
                        "targets" => [5, 6],
                        "render" => "$.fn.dataTable.render.number('.', ',', 2, '')"
                    ]
                ],
                "drawCallback" => "function (settings) {
                        var api = this.api();

                        // Remove the formatting to get integer data for summation
                        var intVal = function (i) {
                            return typeof i === 'string' ? i.replace(/[\$,]/g, '') * 1 : typeof i === 'number' ? i : 0;
                        };

                        total = api
                        .column(6)
                        .data()
                        .reduce(function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0);

                        $(api.column(6).footer()).html(total.toLocaleString('id-ID', { minimumFractionDigits: 2 }));
                    }"
            ]);


        return view('pages.penatausahaan.bendahara-pengeluaran.pajak-gu.index', compact('table', 'bukti_gu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(BuktiGu $bukti_gu)
    {
        return view('pages.penatausahaan.bendahara-pengeluaran.pajak-gu.create', compact('bukti_gu'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PajakGuRequest $request)
    {

        PajakGu::create($request->validated());

        return response()->json(['message' => 'Data berhasil ditambah.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(PajakGu $pajak_gu)
    {
        return view('pages.penatausahaan.bendahara-pengeluaran.pajak-gu.edit', compact('pajak_gu'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PajakGuRequest $request, PajakGu $pajak_gu)
    {
        $pajak_gu->update($request->validated());

        return response()->json(['message' => 'Data berhasil diubah.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(PajakGu $pajak_gu)
    {
        $pajak_gu->delete();

        return response()->json(['message' => 'Data berhasil dihapus.']);
    }
}
