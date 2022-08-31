<?php

namespace App\Http\Controllers\BendPengeluaran;

use App\Http\Controllers\Controller;
use App\Http\Requests\BendPengeluaran\SpjGuRequest;
use App\Models\SpjGu;
use PDF;
use Yajra\DataTables\Facades\DataTables;
use Yajra\DataTables\Html\Builder;

class SpjGuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Builder $builder)
    {
        if (request()->wantsJson()) {
            $data = SpjGu::orderBy('tgl', 'desc')
                ->orderBy('no', 'desc')
                ->get();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($item) {
                    return '<button title="Hapus - ID ' . $item->id . '" onclick="return deleteData(\'' . route('spj-gu.destroy', $item->id) . '\', \'#spj-gu\')" type="button" class="btn btn-sm btn-danger btn-icon-only mr-1 rounded-circle">
                      <span class="btn-inner--icon"><i style="font-size: 10px" class="fas fa-trash"></i></span>
                    </button>
                    <button title="Ubah - ID ' . $item->id . '" onclick="return showModalBox(\'Edit SPJ GU\',\'' . route('spj-gu.edit', $item->id) . '\', \'lg\')"  type="button" class="btn btn-sm btn-warning btn-icon-only mr-1 rounded-circle">
                      <span class="btn-inner--icon"><i style="font-size: 10px" class="fas fa-edit"></i></span>
                    </button>';
                })
                ->addColumn('print_checklist_spp', function ($item) {
                    return '<button title="Cetak Checklist SPP-GU - ' . $item->id . '" onclick="return showModalPdfBox(\'Cetak Checklist SPP-GU\',\'' . route('spj-gu.print.checklist-spp', $item->id) . '\')"  type="button" class="btn btn-sm btn-primary btn-icon-only mr-1 rounded-circle">
                    <span class="btn-inner--icon"><i style="font-size: 10px" class="fas fa-print"></i></span>
                  </button>';
                })
                ->addColumn('print_spp', function ($item) {
                    return '<button title="Cetak Surat Pengantar SPP-GU - ' . $item->id . '" onclick="return showModalPdfBox(\'Cetak Surat Pengantar SPP-GU\',\'' . route('spj-gu.print.surat-pengantar-spp', $item->id) . '\')"  type="button" class="btn btn-sm btn-success btn-icon-only mr-1 rounded-circle">
                    <span class="btn-inner--icon"><i style="font-size: 10px" class="fas fa-print"></i></span>
                    </button>
                    <button title="Cetak Ringkasan SPP-GU - ' . $item->id . '" onclick="return showModalPdfBox(\'Cetak Ringkasan SPP-GU\',\'' . route('spj-gu.print.ringkasan-spp', $item->id) . '\')"  type="button" class="btn btn-sm btn-info btn-icon-only mr-1 rounded-circle">
                    <span class="btn-inner--icon"><i style="font-size: 10px" class="fas fa-print"></i></span>
                    </button>
                    <button title="Cetak Rincian SPP-GU - ' . $item->id . '" onclick="return showModalPdfBox(\'Cetak Rincian SPP-GU\',\'' . route('spj-gu.print.checklist-spp', $item->id) . '\')"  type="button" class="btn btn-sm btn-warning btn-icon-only mr-1 rounded-circle">
                    <span class="btn-inner--icon"><i style="font-size: 10px" class="fas fa-print"></i></span>
                    </button>';
                })
                ->addColumn('print_spm', function ($item) {
                    return '<button title="Cetak SPM-GU - ' . $item->id . '" onclick="return showModalPdfBox(\'Cetak SPM-GU\',\'' . route('spj-gu.print.checklist-spp', $item->id) . '\')"  type="button" class="btn btn-sm btn-default btn-icon-only mr-1 rounded-circle">
                    <span class="btn-inner--icon"><i style="font-size: 10px" class="fas fa-print"></i></span>
                    </button>';
                })
                ->addColumn('print_sp2d', function ($item) {
                    return '<button title="Cetak SP2D-GU - ' . $item->id . '" onclick="return showModalPdfBox(\'Cetak SP2D-GU\',\'' . route('spj-gu.print.checklist-spp', $item->id) . '\')"  type="button" class="btn btn-sm btn-primary btn-icon-only mr-1 rounded-circle">
                    <span class="btn-inner--icon"><i style="font-size: 10px" class="fas fa-print"></i></span>
                    </button>';
                })
                ->rawColumns(['action', 'print_checklist_spp', 'print_spp', 'print_spm', 'print_sp2d'])
                ->make(true);
        }

        $table = $builder->ajax(route('spj-gu.index'))
            ->addAction(['title' => '', 'style' => 'width: 1%;'])
            ->addIndex(['title' => 'No', 'style' => 'width: 1%;', 'class' => 'text-center'])
            ->addColumn(['data' => 'tgl', 'title' => 'Tanggal', 'class' => 'text-center'])
            ->addColumn(['data' => 'print_checklist_spp', 'title' => '<i class="fas fa-check-square"></i>', 'class' => 'text-center'])
            ->addColumn(['data' => 'no_dokumen', 'title' => 'Nomor SPJ GU', 'class' => 'text-wrap'])
            ->addColumn(['data' => 'print_spp', 'title' => 'SPP GU'])
            ->addColumn(['data' => 'print_spm', 'title' => 'SPM GU'])
            ->addColumn(['data' => 'print_sp2d', 'title' => 'SP2D GU'])
            ->parameters([
                "columnDefs" => [
                    [
                        "targets" => [2],
                        "render" => "$.fn.dataTable.render.moment('DD/MM/YYYY')"
                    ],
                ],
            ]);


        return view('pages.penatausahaan.bendahara-pengeluaran.spj-gu.index', compact('table'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $last_no = SpjGu::getLastNoNumber();
        return view('pages.penatausahaan.bendahara-pengeluaran.spj-gu.create', compact('last_no'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SpjGuRequest $request)
    {

        SpjGu::create($request->validated());

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
    public function edit(SpjGu $spj_gu)
    {
        return view('pages.penatausahaan.bendahara-pengeluaran.spj-gu.edit', [
            'item' => $spj_gu
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SpjGuRequest $request, SpjGu $spj_gu)
    {
        $spj_gu->update($request->validated());

        return response()->json(['message' => 'Data berhasil diubah.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(SpjGu $spj_gu)
    {
        $spj_gu->delete();

        return response()->json(['message' => 'Data berhasil dihapus.']);
    }

    public function printChecklistSpp(SpjGu $spj_gu)
    {
        $pdf = PDF::loadView('documents.bendahara-pengeluaran.gu.checklist-spp', compact('spj_gu'));
        return $pdf->stream('file.pdf');
    }

    public function printSuratPengantarSpp(SpjGu $spj_gu)
    {
        $pdf = PDF::loadView('documents.bendahara-pengeluaran.gu.surat-pengantar-spp', compact('spj_gu'));
        return $pdf->stream('file.pdf');
    }

    public function printRingkasanSpp(SpjGu $spj_gu)
    {
        $pdf = PDF::loadView('documents.bendahara-pengeluaran.gu.ringkasan-spp', compact('spj_gu'));
        return $pdf->stream('file.pdf');
    }
}
