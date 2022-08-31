<?php

namespace App\Http\Controllers\Setup\Rekening;

use App\Http\Controllers\Controller;
use App\Http\Requests\Setup\Rekening\Rekening1Request;
use App\Models\Rekening\Rekening1;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Yajra\DataTables\Html\Builder;

class Rekening1Controller extends Controller
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
                Rekening1::orderBy('kode1')->get()
            )
                // ->addIndexColumn()
                ->addColumn('action', function ($item) {
                    return '<button title="Hapus - ID ' . $item->id . '" onclick="return deleteData(\'' . route('rekening1.destroy', $item->id) . '\', \'#rekening1\')" type="button" class="btn btn-sm btn-danger btn-icon-only mr-1 rounded-circle">
                      <span class="btn-inner--icon"><i style="font-size: 10px" class="fas fa-trash"></i></span>
                    </button>
                    <button title="Ubah - ID ' . $item->id . '" onclick="return showModalBox(\'Edit Akun Rekening\',\'' . route('rekening1.edit', $item->id) . '\')"  type="button" class="btn btn-sm btn-warning btn-icon-only mr-1 rounded-circle">
                      <span class="btn-inner--icon"><i style="font-size: 10px" class="fas fa-edit"></i></span>
                    </button>';
                })
                ->make(true);
        }

        $table = $builder->ajax(route('rekening1.index'))
            ->addAction(['title' => '', 'style' => 'width: 1%;'])
            // ->addIndex(['title' => 'No.', 'style' => 'width: 1%;', 'class' => 'text-center'])
            ->addColumn(['data' => 'kode', 'title' => 'Kode', 'style' => 'width: 1%;'])
            ->addColumn(['data' => 'nama', 'title' => 'Nama Rekening']);


        return view('pages.setup.rekening.rekening1.index', compact('table'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.setup.rekening.rekening1.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Rekening1Request $request)
    {
        Rekening1::create($request->validated());

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
    public function edit(Rekening1 $rekening1)
    {
        return view('pages.setup.rekening.rekening1.edit', [
            'item' => $rekening1
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Rekening1Request $request, Rekening1 $rekening1)
    {
        $rekening1->update($request->validated());

        return response()->json(['message' => 'Data berhasil diubah.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rekening1 $rekening1)
    {
        $rekening1->delete();

        return response()->json(['message' => 'Data berhasil dihapus.']);
    }

    public function select(Request $request)
    {
        return Rekening1::orderBy('kode1')
            ->when($request->search, function ($query) use ($request) {
                $query->orWhere('nama', 'like', '%' . $request->search . '%');
            })
            ->get();
    }
}
