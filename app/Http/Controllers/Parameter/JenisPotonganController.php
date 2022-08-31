<?php

namespace App\Http\Controllers\Parameter;

use App\Http\Controllers\Controller;
use App\Http\Requests\Parameter\JenisPotonganRequest;
use App\Models\JenisPotongan;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Yajra\DataTables\Html\Builder;

class JenisPotonganController extends Controller
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
                JenisPotongan::orderBy('nama')->get()
            )
                ->addIndexColumn()
                ->addColumn('action', function ($item) {
                    return '<button title="Hapus - ID ' . $item->id . '" onclick="return deleteData(\'' . route('jenis-potongan.destroy', $item->id) . '\', \'.dataTable\')" type="button" class="btn btn-sm btn-danger btn-icon-only mr-1 rounded-circle">
                      <span class="btn-inner--icon"><i style="font-size: 10px" class="fas fa-trash"></i></span>
                    </button>
                    <button title="Ubah - ID ' . $item->id . '" onclick="return showModalBox(\'Edit Jenis Potongan\',\'' . route('jenis-potongan.edit', $item->id) . '\')"  type="button" class="btn btn-sm btn-warning btn-icon-only mr-1 rounded-circle">
                      <span class="btn-inner--icon"><i style="font-size: 10px" class="fas fa-edit"></i></span>
                    </button>';
                })
                ->make(true);
        }

        $table = $builder->ajax(route('jenis-potongan.index'))
            ->addAction(['title' => '', 'style' => 'width: 1%;'])
            ->addIndex(['title' => 'No.', 'style' => 'width: 1%;', 'class' => 'text-center'])
            ->addColumn(['data' => 'nama', 'title' => 'Jenis Potongan']);


        return view('pages.penatausahaan.parameter.jenis-potongan.index', compact('table'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.penatausahaan.parameter.jenis-potongan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(JenisPotonganRequest $request)
    {

        JenisPotongan::create($request->validated());

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
    public function edit(JenisPotongan $jenis_potongan)
    {
        return view('pages.penatausahaan.parameter.jenis-potongan.edit', [
            'item' => $jenis_potongan
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(JenisPotonganRequest $request, JenisPotongan $jenis_potongan)
    {
        $jenis_potongan->update($request->validated());

        return response()->json(['message' => 'Data berhasil diubah.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(JenisPotongan $jenis_potongan)
    {
        $jenis_potongan->delete();

        return response()->json(['message' => 'Data berhasil dihapus.']);
    }

    public function select(Request $request)
    {
        return JenisPotongan::orderBy('nama')
            ->when($request->search, function ($query) use ($request) {
                $query->orWhere('nama', 'like', '%' . $request->search . '%');
            })
            ->get();
    }
}
