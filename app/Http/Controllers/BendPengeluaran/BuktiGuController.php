<?php

namespace App\Http\Controllers\BendPengeluaran;

use App\Http\Controllers\Controller;
use App\Http\Requests\BendPengeluaran\BuktiGuRequest;
use App\Models\BuktiGu;
use Yajra\DataTables\Facades\DataTables;
use Yajra\DataTables\Html\Builder;

class BuktiGuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Builder $builder)
    {
        if (request()->wantsJson()) {
            $data = BuktiGu::withCount('pajak_gu')
                ->withSum('pajak_gu', 'nilai')
                ->orderBy('tgl', 'desc')
                ->orderBy('no', 'desc')
                ->get();

            return DataTables::of($data)
                ->with('total_nilai', $data->sum(function ($n) {
                    return $n->nilai;
                }))
                ->with('total_pajak', $data->sum(function ($n) {
                    return $n->pajak_gu_sum_nilai;
                }))
                ->addIndexColumn()
                ->addColumn('kode', function ($item) {
                    if ($item->uraian_rekening) return $item->uraian_rekening->rekening6->kode;
                    return '';
                })
                ->editColumn('pajak_gu_sum_nilai', function ($item) {
                    if ($item->pajak_gu_sum_nilai > 0) {
                        return $item->pajak_gu_sum_nilai;
                    }
                    return 0;
                })
                ->addColumn('pajak_button', function ($item) {
                    return '<button title="Lihat Potongan Pajak" onclick="return showModalBox(\'Detail Pajak GU No. ' . $item->no . '\',\'' . route('pajak-gu.index', ['bukti_gu' => $item->id]) . '\', \'xl\')" type="button" class="btn btn-sm btn-primary btn-icon-only mr-1 rounded-circle">
                        <span class="btn-inner--icon"><i style="font-size: 10px" class="fas fa-cut"></i></span>
                      </button>';
                })
                ->addColumn('action', function ($item) {
                    return '<button title="Hapus - ID ' . $item->id . '" onclick="return deleteData(\'' . route('bukti-gu.destroy', $item->id) . '\', \'#bukti-gu\')" type="button" class="btn btn-sm btn-danger btn-icon-only mr-1 rounded-circle">
                      <span class="btn-inner--icon"><i style="font-size: 10px" class="fas fa-trash"></i></span>
                    </button>
                    <button title="Ubah - ID ' . $item->id . '" onclick="return showModalBox(\'Edit Bukti GU\',\'' . route('bukti-gu.edit', $item->id) . '\', \'lg\')"  type="button" class="btn btn-sm btn-warning btn-icon-only mr-1 rounded-circle">
                      <span class="btn-inner--icon"><i style="font-size: 10px" class="fas fa-edit"></i></span>
                    </button>';
                })
                ->rawColumns(['action', 'pajak_button'])
                ->make(true);
        }

        $table = $builder->ajax(route('bukti-gu.index'))
            ->addAction(['title' => '', 'style' => 'width: 1%;'])
            ->addIndex(['title' => 'No', 'style' => 'width: 1%;', 'class' => 'text-center'])
            ->addColumn(['data' => 'tgl', 'title' => 'Tanggal', 'class' => 'text-center'])
            ->addColumn(['data' => 'no', 'title' => 'Nomor Bukti', 'class' => 'text-center text-wrap'])
            ->addColumn(['data' => 'uraian', 'title' => 'Uraian', 'class' => 'text-wrap'])
            ->addColumn(['data' => 'kode', 'title' => 'Kode Rekening', 'class' => 'text-center'])
            ->addColumn(['data' => 'pajak_gu_sum_nilai', 'title' => 'Potongan Pajak', 'class' => 'text-wrap text-right'])
            ->addColumn(['data' => 'pajak_button', 'title' => '', 'class' => 'text-center', 'orderable' => false])
            ->addColumn(['data' => 'nilai', 'title' => 'Pengeluaran (Rp)', 'class' => 'text-nowrap text-right'])
            ->parameters([
                "columnDefs" => [
                    [
                        "targets" => [2],
                        "render" => "$.fn.dataTable.render.moment('DD/MM/YYYY')"
                    ],
                    [
                        "targets" => [6],
                        "render" => "$.fn.dataTable.render.number('.', ',', 2, '')"
                    ],
                    [
                        "targets" => [8],
                        "render" => "$.fn.dataTable.render.number('.', ',', 2, '')"
                    ],
                ],
                "footerCallback" => "function (row, data, start, end, display) {
                        var api = this.api();
                        var json = api.ajax.json();
             
                         $(api.column(0).footer()).html('TOTAL');
                         $(api.column(6).footer()).html(json.total_pajak.toLocaleString('id-ID', { minimumFractionDigits: 2 }));
                         $(api.column(8).footer()).html(json.total_nilai.toLocaleString('id-ID', { minimumFractionDigits: 2 }));
                    }
                ",
            ]);


        return view('pages.penatausahaan.bendahara-pengeluaran.bukti-gu.index', compact('table'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $last_no = BuktiGu::getLastNoNumber();
        return view('pages.penatausahaan.bendahara-pengeluaran.bukti-gu.create', compact('last_no'));
    }

    public function createSp2dGu()
    {
        return view('pages.penatausahaan.bendahara-pengeluaran.bukti-gu.create-sp2d-gu');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BuktiGuRequest $request)
    {

        BuktiGu::create($request->validated());

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
    public function edit(BuktiGu $bukti_gu)
    {
        return view('pages.penatausahaan.bendahara-pengeluaran.bukti-gu.edit', [
            'item' => $bukti_gu
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BuktiGuRequest $request, BuktiGu $bukti_gu)
    {
        $bukti_gu->update($request->validated());

        return response()->json(['message' => 'Data berhasil diubah.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(BuktiGu $bukti_gu)
    {
        $bukti_gu->delete();

        return response()->json(['message' => 'Data berhasil dihapus.']);
    }
}
