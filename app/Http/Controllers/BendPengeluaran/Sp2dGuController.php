<?php

namespace App\Http\Controllers\BendPengeluaran;

use App\Http\Controllers\Controller;
use App\Http\Requests\BendPengeluaran\Sp2dGuRequest;
use App\Models\Sp2dGu;
use Carbon\Carbon;
use Riskihajar\Terbilang\Facades\Terbilang;
use Yajra\DataTables\Facades\DataTables;
use Yajra\DataTables\Html\Builder;

class Sp2dGuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Builder $builder)
    {
        if (request()->wantsJson()) {
            $data = Sp2dGu::orderBy('tgl', 'desc')
                ->orderBy('no', 'desc')
                ->get();

            return DataTables::of($data)
                ->with('total_nilai', $data->sum(function ($n) {
                    return $n->nilai;
                }))
                ->addIndexColumn()
                ->addColumn('action', function ($item) {
                    return '<button title="Hapus - ID ' . $item->id . '" onclick="return deleteData(\'' . route('sp2d-gu.destroy', $item->id) . '\', \'#sp2d-gu\')" type="button" class="btn btn-sm btn-danger btn-icon-only mr-1 rounded-circle">
                      <span class="btn-inner--icon"><i style="font-size: 10px" class="fas fa-trash"></i></span>
                    </button>
                    <button title="Ubah - ID ' . $item->id . '" onclick="return showModalBox(\'Edit SP2D GU\',\'' . route('sp2d-gu.edit', $item->id) . '\', \'lg\')"  type="button" class="btn btn-sm btn-warning btn-icon-only mr-1 rounded-circle">
                      <span class="btn-inner--icon"><i style="font-size: 10px" class="fas fa-edit"></i></span>
                    </button>';
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        $table = $builder->ajax(route('sp2d-gu.index'))
            ->addAction(['title' => '', 'style' => 'width: 1%;'])
            ->addIndex(['title' => 'No', 'style' => 'width: 1%;', 'class' => 'text-center'])
            ->addColumn(['data' => 'tgl', 'title' => 'Tanggal', 'class' => 'text-center'])
            ->addColumn(['data' => 'no_dokumen', 'title' => 'Nomor SP2D GU', 'class' => 'text-wrap'])
            ->addColumn(['data' => 'uraian', 'title' => 'Uraian', 'class' => 'text-wrap'])
            ->addColumn(['data' => 'no_cek', 'title' => 'Nomor Cek', 'class' => 'text-wrap'])
            ->addColumn(['data' => 'nilai', 'title' => 'Penerimaan (Rp)', 'class' => 'text-nowrap text-right'])
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
                ],
                "footerCallback" => "function (row, data, start, end, display) {
                        var api = this.api();
                        var json = api.ajax.json();
             
                         $(api.column(0).footer()).html('TOTAL');
                         $(api.column(6).footer()).html(json.total_nilai.toLocaleString('id-ID', { minimumFractionDigits: 2 }));
                    }
                ",
            ]);


        return view('pages.penatausahaan.bendahara-pengeluaran.sp2d-gu.index', compact('table'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $last_no = Sp2dGu::getLastNoNumber();
        return view('pages.penatausahaan.bendahara-pengeluaran.sp2d-gu.create', compact('last_no'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Sp2dGuRequest $request)
    {

        Sp2dGu::create($request->validated());

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
    public function edit(Sp2dGu $sp2d_gu)
    {
        return view('pages.penatausahaan.bendahara-pengeluaran.sp2d-gu.edit', [
            'item' => $sp2d_gu
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Sp2dGuRequest $request, Sp2dGu $sp2d_gu)
    {
        $sp2d_gu->update($request->validated());

        return response()->json(['message' => 'Data berhasil diubah.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sp2dGu $sp2d_gu)
    {
        $sp2d_gu->delete();

        return response()->json(['message' => 'Data berhasil dihapus.']);
    }
}
