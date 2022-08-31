<?php

namespace App\Http\Controllers\Anggaran;

use App\Http\Controllers\Controller;
use App\Http\Requests\Anggaran\UraianRekeningRequest;
use App\Models\UraianRekening;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Yajra\DataTables\Html\Builder;

class UraianRekeningController extends Controller
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
                UraianRekening::with(['rekening6', 'rekening6.rekening5', 'rekening6.rekening5.rekening4', 'rekening6.rekening5.rekening4.rekening3', 'rekening6.rekening5.rekening4.rekening3.rekening2', 'rekening6.rekening5.rekening4.rekening3.rekening2.rekening1'])
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
                ->addColumn('action', function ($item) {
                    return '<button data-toggle="tooltip" data-placement="top" title="Hapus - ID ' . $item->id . '" onclick="return deleteData(\'' . route('uraian-rekening.destroy', $item->id) . '\', \'#uraian-rekening\')" type="button" class="btn btn-sm btn-danger btn-icon-only mr-1 rounded-circle">
                      <span class="btn-inner--icon"><i style="font-size: 10px" class="fas fa-trash"></i></span>
                    </button>
                    <button data-toggle="tooltip" data-placement="top" title="Ubah - ID ' . $item->id . '" onclick="return showModalBox(\'Edit Uraian Rekening\',\'' . route('uraian-rekening.edit', $item->id) . '\', \'lg\')"  type="button" class="btn btn-sm btn-warning btn-icon-only mr-1 rounded-circle">
                      <span class="btn-inner--icon"><i style="font-size: 10px" class="fas fa-edit"></i></span>
                    </button>';
                })
                ->make(true);
        }

        $table = $builder->ajax(route('uraian-rekening.index'))
            ->addAction(['title' => '', 'style' => 'width: 1%;'])
            ->addIndex(['title' => 'No.', 'style' => 'width: 1%;', 'class' => 'text-center'])
            ->addColumn(['data' => 'rekening1'])
            ->addColumn(['data' => 'rekening2'])
            ->addColumn(['data' => 'rekening3'])
            ->addColumn(['data' => 'rekening4'])
            ->addColumn(['data' => 'rekening5'])
            ->addColumn(['data' => 'rekening6'])
            ->addColumn(['data' => 'nama', 'title' => 'Uraian'])
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
                                if (last !== group) {
                                    $(rows).eq(i).before(
                                        '<tr><td colspan=\"3\" style=\"font-weight:bold;\">' +
                                        group + '</td></tr>'
                                    );
                                    last = group;
                                }
                            });
                            api.column(3, {
                                page: 'current'
                            }).data().each(function(group, i) {
                                if (last !== group) {
                                    $(rows).eq(i).before(
                                        '<tr><td colspan=\"3\" style=\"font-weight:bold;\">' +
                                        group + '</td></tr>'
                                    );
                                    last = group;
                                }
                            });
                            api.column(4, {
                                page: 'current'
                            }).data().each(function(group, i) {
                                if (last !== group) {
                                    $(rows).eq(i).before(
                                        '<tr><td colspan=\"3\" style=\"font-weight:bold;\">' +
                                        group + '</td></tr>'
                                    );
                                    last = group;
                                }
                            });
                            api.column(5, {
                                page: 'current'
                            }).data().each(function(group, i) {
                                if (last !== group) {
                                    $(rows).eq(i).before(
                                        '<tr><td colspan=\"3\" style=\"font-weight:bold;\">' +
                                        group + '</td></tr>'
                                    );
                                    last = group;
                                }
                            });
                            api.column(6, {
                                page: 'current'
                            }).data().each(function(group, i) {
                                if (last !== group) {
                                    $(rows).eq(i).before(
                                        '<tr><td colspan=\"3\" style=\"font-weight:bold;\">' +
                                        group + '</td></tr>'
                                    );
                                    last = group;
                                }
                            });
                            api.column(7, {
                                page: 'current'
                            }).data().each(function(group, i) {
                                if (last !== group) {
                                    $(rows).eq(i).before(
                                        '<tr><td colspan=\"3\" style=\"font-weight:bold;\">' +
                                        group + '</td></tr>'
                                    );
                                    last = group;
                                }
                            });
                        }
                ",
                "columnDefs" => [
                    [
                        "targets" => [2, 3, 4, 5, 6, 7], "visible" => false
                    ]
                ],
                "lengthMenu" => [
                    [10, 25, 50, 100, -1],
                    [10, 25, 50, 100, 'Semua'],
                ]
            ]);


        return view('pages.anggaran.uraian-rekening.index', compact('table'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('pages.anggaran.uraian-rekening.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UraianRekeningRequest $request)
    {

        UraianRekening::create($request->validated());

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
    public function edit(UraianRekening $uraian_rekening)
    {
        return view('pages.anggaran.uraian-rekening.edit', [
            'item' => $uraian_rekening
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UraianRekeningRequest $request, UraianRekening $uraian_rekening)
    {
        $uraian_rekening->update($request->validated());

        return response()->json(['message' => 'Data berhasil diubah.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(UraianRekening $uraian_rekening)
    {
        $uraian_rekening->delete();

        return response()->json(['message' => 'Data berhasil dihapus.']);
    }

    public function select(Request $request)
    {
        return UraianRekening::with('rekening6')->when($request->search, function ($query) use ($request) {
            $query->orWhere('nama', 'like', '%' . $request->search . '%');
        })
            ->when($request->rekening6_id, function ($query) use ($request) {
                $query->where('rekening6_id', $request->rekening6_id);
            })
            ->when($request->id, function ($query) use ($request) {
                $query->where('id', $request->id);
            })
            ->get();
    }
}
