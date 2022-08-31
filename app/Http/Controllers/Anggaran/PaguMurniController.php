<?php

namespace App\Http\Controllers\Anggaran;

use App\Http\Controllers\Controller;
use App\Http\Requests\Anggaran\PaguMurniRequest;
use App\Models\PaguMurni;
use App\Models\UraianRekening;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Yajra\DataTables\Html\Builder;

class PaguMurniController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Builder $builder)
    {
        if (request()->wantsJson()) {
            return DataTables::of(
                UraianRekening::with('pagu_murni')
                    ->get()
                    ->sortBy(function ($query) {
                        return $query->rekening6->kode;
                    })
            )
                ->addIndexColumn()
                ->addColumn('rekening1', function ($item) {
                    return $item->rekening6->rekening5->rekening4->rekening3->rekening2->rekening1->kode . '⠀⠀' . $item->rekening6->rekening5->rekening4->rekening3->rekening2->rekening1->nama;
                })
                ->addColumn('rekening2', function ($item) {
                    return $item->rekening6->rekening5->rekening4->rekening3->rekening2->kode . '⠀⠀' . $item->rekening6->rekening5->rekening4->rekening3->rekening2->nama;
                })
                ->addColumn('rekening3', function ($item) {
                    return $item->rekening6->rekening5->rekening4->rekening3->kode . '⠀⠀' . $item->rekening6->rekening5->rekening4->rekening3->nama;
                })
                ->addColumn('rekening4', function ($item) {
                    return $item->rekening6->rekening5->rekening4->kode . '⠀⠀' . $item->rekening6->rekening5->rekening4->nama;
                })
                ->addColumn('rekening5', function ($item) {
                    return $item->rekening6->rekening5->kode . '⠀⠀' . $item->rekening6->rekening5->nama;
                })
                ->addColumn('rekening6', function ($item) {
                    return $item->rekening6->kode . '⠀⠀' . $item->rekening6->nama;
                })
                ->addColumn('nilai', function ($item) {
                    if ($item?->pagu_murni?->nilai) {
                        return $item->pagu_murni->nilai;
                    }
                    return 0;
                })
                ->addColumn('action', function ($item) {
                    if ($item?->pagu_murni?->nilai) {
                        return '<button title="Edit Pagu - ID ' . $item->id . '" onclick="return showModalBox(\'Edit Pagu Murni\',\'' . route('pagu-murni.edit', $item?->pagu_murni?->id) . '\', \'lg\')"  type="button" class="btn btn-sm btn-warning btn-icon-only rounded-circle">
                      <span class="btn-inner--icon"><i style="font-size: 10px" class="fas fa-edit"></i></span>
                    </button>';
                    }
                    return '<button title="Tetapkan Pagu - ID ' . $item->id . '" onclick="return showModalBox(\'Tetapkan Pagu Murni\',\'' . route('pagu-murni.create', ['uraian_rekening' => $item->id]) . '\', \'lg\')"  type="button" class="btn btn-sm btn-success btn-icon-only rounded-circle">
                  <span class="btn-inner--icon"><i style="font-size: 10px" class="fas fa-money-bill"></i></span>
                </button>';
                })
                ->make(true);
        }

        $table = $builder->ajax(route('pagu-murni.index'))
            ->dom('tr')
            ->addAction(['title' => '', 'style' => 'width: 1%;'])
            ->addIndex(['title' => 'No.', 'style' => 'width: 1%;', 'class' => 'text-center'])
            ->addColumn(['data' => 'rekening1'])
            ->addColumn(['data' => 'rekening2'])
            ->addColumn(['data' => 'rekening3'])
            ->addColumn(['data' => 'rekening4'])
            ->addColumn(['data' => 'rekening5'])
            ->addColumn(['data' => 'rekening6'])
            ->addColumn(['data' => 'nama', 'title' => 'Uraian', 'orderable' => false])
            ->addColumn(['data' => 'nilai', 'title' => 'Anggaran', 'class' => 'text-right', 'orderable' => false])
            ->parameters([
                "drawCallback" => "
                function(settings) {
                var api = this.api();
                            var rows = api.rows({
                                page: 'current'
                            }).nodes();
                            var last = null;

                            api.column(2, {
                                page: 'current'
                            }).data().each(function(group, i) {
                                const sum = api.data()
                                               .filter((item) => item.rekening1 === group)
                                               .pluck('nilai')
                                               .reduce((a,b) => { return Number(a) + Number(b); }, 0)
                                               .toLocaleString('id-ID', { minimumFractionDigits: 2 });

                                if (last !== group) {
                                    $(rows).eq(i).before(
                                        '<tr style=\"font-weight:bold;background: #5e72e4;color: white;\"><td colspan=\"3\">' +
                                        group + '</td><td class=\"text-right\">' + sum + '</td></tr>'
                                    );
                                    last = group;
                                }
                            });
                            api.column(3, {
                                page: 'current'
                            }).data().each(function(group, i) {
                                const sum = api.data()
                                               .filter((item) => item.rekening2 === group)
                                               .pluck('nilai')
                                               .reduce((a,b) => { return Number(a) + Number(b); }, 0)
                                               .toLocaleString('id-ID', { minimumFractionDigits: 2 });

                                if (last !== group) {
                                    $(rows).eq(i).before(
                                        '<tr style=\"font-weight:bold; background: #2dce89;\"><td colspan=\"3\">' +
                                        group + '</td><td class=\"text-right\">' + sum + '</td></tr>'
                                    );
                                    last = group;
                                }
                            });
                            api.column(4, {
                                page: 'current'
                            }).data().each(function(group, i) {
                                const sum = api.data()
                                               .filter((item) => item.rekening3 === group)
                                               .pluck('nilai')
                                               .reduce((a,b) => { return Number(a) + Number(b); }, 0)
                                               .toLocaleString('id-ID', { minimumFractionDigits: 2 });

                                if (last !== group) {
                                    $(rows).eq(i).before(
                                        '<tr style=\"font-weight:bold; background: #11cdef;\"><td colspan=\"3\">' +
                                        group + '</td><td class=\"text-right\">' + sum + '</td></tr>'
                                    );
                                    last = group;
                                }
                            });
                            api.column(5, {
                                page: 'current'
                            }).data().each(function(group, i) {
                                const sum = api.data()
                                               .filter((item) => item.rekening4 === group)
                                               .pluck('nilai')
                                               .reduce((a,b) => { return Number(a) + Number(b); }, 0)
                                               .toLocaleString('id-ID', { minimumFractionDigits: 2 });

                                if (last !== group) {
                                    $(rows).eq(i).before(
                                        '<tr style=\"font-weight:bold; background: rgb(94,114,228,0.5);\"><td colspan=\"3\">' +
                                        group + '</td><td class=\"text-right\">' + sum + '</td></tr>'
                                    );
                                    last = group;
                                }
                            });
                            api.column(6, {
                                page: 'current'
                            }).data().each(function(group, i) {
                                const sum = api.data()
                                               .filter((item) => item.rekening5 === group)
                                               .pluck('nilai')
                                               .reduce((a,b) => { return Number(a) + Number(b); }, 0)
                                               .toLocaleString('id-ID', { minimumFractionDigits: 2 });

                                if (last !== group) {
                                    $(rows).eq(i).before(
                                        '<tr style=\"font-weight:bold; background: #dfdfdf;\"><td colspan=\"3\">' +
                                        group + '</td><td class=\"text-right\">' + sum + '</td></tr>'
                                    );
                                    last = group;
                                }
                            });
                            api.column(7, {
                                page: 'current'
                            }).data().each(function(group, i) {
                                const sum = api.data()
                                               .filter((item) => item.rekening6 === group)
                                               .pluck('nilai')
                                               .reduce((a,b) => { return Number(a) + Number(b); }, 0)
                                               .toLocaleString('id-ID', { minimumFractionDigits: 2 });

                                if (last !== group) {
                                    $(rows).eq(i).before(
                                        '<tr style=\"font-weight:bold; background: #f3f3f3;\"><td colspan=\"3\">' +
                                        group + '</td><td class=\"text-right\">' + sum + '</td></tr>'
                                    );
                                    last = group;
                                }
                            });
                        }
                ",
                "columnDefs" => [
                    [
                        "targets" => [2, 3, 4, 5, 6, 7], "visible" => false,
                    ],
                    [
                        "targets" => 9,
                        "render" => "$.fn.dataTable.render.number('.', ',', 2, '')"
                    ]
                ],
                "lengthMenu" => [
                    [-1],
                    ['Semua'],
                ]
            ]);


        return view('pages.anggaran.pagu-murni.index', compact('table'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, UraianRekening $uraian_rekening)
    {
        if ($uraian_rekening->pagu_murni) {
            return response()->json(['message' => 'Pagu murni sudah ditetapkan sebelumnya, silakan ubah melalui menu edit.'], 400);
        }

        return view('pages.anggaran.pagu-murni.create', compact('uraian_rekening'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PaguMurniRequest $request)
    {

        PaguMurni::create($request->validated());

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
    public function edit(PaguMurni $pagu_murni)
    {
        return view('pages.anggaran.pagu-murni.edit', [
            'item' => $pagu_murni
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PaguMurniRequest $request, PaguMurni $pagu_murni)
    {
        $pagu_murni->update($request->validated());

        return response()->json(['message' => 'Data berhasil diubah.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(PaguMurni $pagu_murni)
    {
        $pagu_murni->delete();

        return response()->json(['message' => 'Data berhasil dihapus.']);
    }
}
