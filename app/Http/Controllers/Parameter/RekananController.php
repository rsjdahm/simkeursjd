<?php

namespace App\Http\Controllers\Parameter;

use App\Http\Controllers\Controller;
use App\Http\Requests\Parameter\RekananRequest;
use App\Models\Rekanan;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Yajra\DataTables\Html\Builder;

class RekananController extends Controller
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
                Rekanan::orderBy('nama')->get()
            )
                ->addIndexColumn()
                ->addColumn('action', function ($item) {
                    return '<button title="Hapus - ID ' . $item->id . '" onclick="return deleteData(\'' . route('rekanan.destroy', $item->id) . '\', \'#rekanan\')" type="button" class="btn btn-sm btn-danger btn-icon-only mr-1 rounded-circle">
                      <span class="btn-inner--icon"><i style="font-size: 10px" class="fas fa-trash"></i></span>
                    </button>
                    <button title="Ubah - ID ' . $item->id . '" onclick="return showModalBox(\'Edit Rekanan\',\'' . route('rekanan.edit', $item->id) . '\', \'lg\')"  type="button" class="btn btn-sm btn-warning btn-icon-only mr-1 rounded-circle">
                      <span class="btn-inner--icon"><i style="font-size: 10px" class="fas fa-edit"></i></span>
                    </button>';
                })
                ->make(true);
        }

        $table = $builder->ajax(route('rekanan.index'))
            ->addAction(['title' => '', 'style' => 'width: 1%;'])
            ->addIndex(['title' => 'No.', 'style' => 'width: 1%;', 'class' => 'text-center'])
            ->addColumn(['data' => 'nama', 'title' => 'Nama Rekanan', 'class' => 'text-wrap'])
            ->addColumn(['data' => 'bentuk_rekanan.nama', 'title' => 'Bentuk Usaha', 'class' => 'text-center text-wrap'])
            ->addColumn(['data' => 'npwp', 'title' => 'NPWP', 'class' => 'text-wrap'])
            ->addColumn(['data' => 'alamat', 'title' => 'Alamat', 'class' => 'text-wrap'])
            ->addColumn(['data' => 'jenis_bank.nama', 'title' => 'Jenis Bank', 'class' => 'text-wrap'])
            ->addColumn(['data' => 'no_rek', 'title' => 'No. Rekening', 'class' => 'text-wrap']);


        return view('pages.penatausahaan.parameter.rekanan.index', compact('table'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.penatausahaan.parameter.rekanan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RekananRequest $request)
    {

        Rekanan::create($request->validated());

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
    public function edit(Rekanan $rekanan)
    {
        return view('pages.penatausahaan.parameter.rekanan.edit', compact('rekanan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RekananRequest $request, Rekanan $rekanan)
    {
        $rekanan->update($request->validated());

        return response()->json(['message' => 'Data berhasil diubah.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rekanan $rekanan)
    {
        $rekanan->delete();

        return response()->json(['message' => 'Data berhasil dihapus.']);
    }

    public function select(Request $request)
    {
        return Rekanan::orderBy('nama')
            ->when($request->search, function ($query) use ($request) {
                $query->orWhere('nama', 'like', '%' . $request->search . '%');
            })
            ->get();
    }
}
