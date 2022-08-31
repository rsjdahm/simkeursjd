<?php

namespace App\Http\Controllers\Parameter;

use App\Http\Controllers\Controller;
use App\Http\Requests\Parameter\PotonganRequest;
use App\Models\Potongan;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Yajra\DataTables\Html\Builder;

class PotonganController extends Controller
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
                Potongan::orderBy('nama')->get()
            )
                ->addIndexColumn()
                ->addColumn('action', function ($item) {
                    return '<button data-toggle="tooltip" data-placement="top" title="Hapus - ID ' . $item->id . '" onclick="return deleteData(\'' . route('potongan.destroy', $item->id) . '\', \'#potongan\')" type="button" class="btn btn-sm btn-danger btn-icon-only mr-1 rounded-circle">
                      <span class="btn-inner--icon"><i style="font-size: 10px" class="fas fa-trash"></i></span>
                    </button>
                    <button data-toggle="tooltip" data-placement="top" title="Ubah - ID ' . $item->id . '" onclick="return showModalBox(\'Edit Parameter Potongan\',\'' . route('potongan.edit', $item->id) . '\')"  type="button" class="btn btn-sm btn-warning btn-icon-only mr-1 rounded-circle">
                      <span class="btn-inner--icon"><i style="font-size: 10px" class="fas fa-edit"></i></span>
                    </button>';
                })
                ->editColumn('is_dpp_harga_jual', function ($item) {
                    if ($item->is_dpp_harga_jual) {
                        return '<i class="fas fa-check"></i>';
                    }
                    return '<i class="fas fa-times text-gray"></i>';
                })
                ->rawColumns(['action', 'is_dpp_harga_jual'])
                ->make(true);
        }

        $table = $builder->ajax(route('potongan.index'))
            ->addAction(['title' => '', 'style' => 'width: 1%;'])
            ->addIndex(['title' => 'No.', 'style' => 'width: 1%;', 'class' => 'text-center'])
            ->addColumn(['data' => 'jenis_potongan.nama', 'title' => 'Jenis Potongan', 'class' => 'text-wrap'])
            ->addColumn(['data' => 'nama', 'title' => 'Potongan', 'class' => 'text-wrap'])
            ->addColumn(['data' => 'kode_map', 'title' => 'Kode MAP', 'class' => 'text-center'])
            ->addColumn(['data' => 'is_dpp_harga_jual', 'title' => 'DPP = Harga Jual', 'class' => 'text-center text-wrap'])
            ->addColumn(['data' => 'perhitungan', 'title' => 'Rumus Perhitungan', 'class' => 'text-wrap']);


        return view('pages.penatausahaan.parameter.potongan.index', compact('table'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.penatausahaan.parameter.potongan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PotonganRequest $request)
    {

        Potongan::create($request->validated());

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
    public function edit(Potongan $potongan)
    {
        return view('pages.penatausahaan.parameter.potongan.edit', [
            'item' => $potongan
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PotonganRequest $request, Potongan $potongan)
    {
        $potongan->update($request->validated());

        return response()->json(['message' => 'Data berhasil diubah.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Potongan $potongan)
    {
        $potongan->delete();

        return response()->json(['message' => 'Data berhasil dihapus.']);
    }

    public function select(Request $request)
    {
        return Potongan::orderBy('nama')
            ->when($request->search, function ($query) use ($request) {
                $query->orWhere('nama', 'like', '%' . $request->search . '%');
            })
            ->get();
    }
}
