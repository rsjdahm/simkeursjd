<?php

namespace App\Http\Controllers\Setup\Rekening;

use App\Http\Controllers\Controller;
use App\Http\Requests\Setup\Rekening\Rekening4Request;
use App\Models\Rekening\Rekening4;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Yajra\DataTables\Html\Builder;

class Rekening4Controller extends Controller
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
                Rekening4::orderBy('kode1')
                    ->orderBy('kode2')
                    ->orderBy('kode3')
                    ->orderBy('kode4')
                    ->get()
            )
                // ->addIndexColumn()
                ->addColumn('rekening1', function ($item) {
                    return $item->rekening3->rekening2->rekening1->kode . '⠀⠀' . $item->rekening3->rekening2->rekening1->nama;
                })
                ->addColumn('rekening2', function ($item) {
                    return $item->rekening3->rekening2->kode . '⠀⠀' . $item->rekening3->rekening2->nama;
                })
                ->addColumn('rekening3', function ($item) {
                    return $item->rekening3->kode . '⠀⠀' . $item->rekening3->nama;
                })
                ->addColumn('action', function ($item) {
                    return '<button title="Hapus - ID ' . $item->id . '" onclick="return deleteData(\'' . route('rekening4.destroy', $item->id) . '\', \'#rekening4\')" type="button" class="btn btn-sm btn-danger btn-icon-only mr-1 rounded-circle">
                      <span class="btn-inner--icon"><i style="font-size: 10px" class="fas fa-trash"></i></span>
                    </button>
                    <button title="Ubah - ID ' . $item->id . '" onclick="return showModalBox(\'Edit Akun Rekening\',\'' . route('rekening4.edit', $item->id) . '\')"  type="button" class="btn btn-sm btn-warning btn-icon-only mr-1 rounded-circle">
                      <span class="btn-inner--icon"><i style="font-size: 10px" class="fas fa-edit"></i></span>
                    </button>';
                })
                ->make(true);
        }

        $table = $builder->ajax(route('rekening4.index'))
            ->addColumn(['data' => 'rekening1'])
            ->addColumn(['data' => 'rekening2'])
            ->addColumn(['data' => 'rekening3'])
            ->addAction(['title' => '', 'style' => 'width: 1%;'])
            // ->addIndex(['title' => 'No.', 'style' => 'width: 1%;', 'class' => 'text-center'])
            ->addColumn(['data' => 'kode', 'title' => 'Kode', 'style' => 'width: 1%;'])
            ->addColumn(['data' => 'nama', 'title' => 'Nama Rekening'])
            ->parameters([
                "drawCallback" => "
                function(settings) {
                var api = this.api();
                            var rows = api.rows({
                                page: 'current'
                            }).nodes();
                            var last = null;

                            api.column(0, {
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
                            api.column(1, {
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
                        }
                ",
                "columnDefs" => [
                    [
                        "targets" => [0, 1, 2], "visible" => false
                    ]
                ],
                "lengthMenu" => [
                    [10, 25, 50, 100, -1],
                    [10, 25, 50, 100, 'Semua'],
                ]
            ]);


        return view('pages.setup.rekening.rekening4.index', compact('table'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.setup.rekening.rekening4.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Rekening4Request $request)
    {
        Rekening4::create($request->validated());

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
    public function edit(Rekening4 $rekening4)
    {
        return view('pages.setup.rekening.rekening4.edit', [
            'item' => $rekening4
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Rekening4Request $request, Rekening4 $rekening4)
    {
        $rekening4->update($request->validated());

        return response()->json(['message' => 'Data berhasil diubah.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rekening4 $rekening4)
    {
        $rekening4->delete();

        return response()->json(['message' => 'Data berhasil dihapus.']);
    }

    public function select(Request $request)
    {
        return Rekening4::orderBy('kode1')->orderBy('kode2')->orderBy('kode3')->orderBy('kode4')
            ->when($request->search, function ($query) use ($request) {
                $query->orWhere('nama', 'like', '%' . $request->search . '%');
            })
            ->when($request->rekening3_id, function ($query) use ($request) {
                $query->where('rekening3_id', $request->rekening3_id);
            })
            ->get();
    }
}
