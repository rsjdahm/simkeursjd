<?php

namespace App\Http\Controllers\Parameter;

use App\Http\Controllers\Controller;
use App\Http\Requests\Parameter\BankTujuanRequest;
use App\Models\BankTujuan;
use Yajra\DataTables\Facades\DataTables;
use Yajra\DataTables\Html\Builder;

class BankTujuanController extends Controller
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
                BankTujuan::orderBy('nama')->get()
            )
                ->addIndexColumn()
                ->addColumn('action', function ($item) {
                    return '<button title="Hapus - ID ' . $item->id . '" onclick="return deleteData(\'' . route('bank-tujuan.destroy', $item->id) . '\', \'#bank-tujuan\')" type="button" class="btn btn-sm btn-danger btn-icon-only mr-1 rounded-circle">
                      <span class="btn-inner--icon"><i style="font-size: 10px" class="fas fa-trash"></i></span>
                    </button>
                    <button title="Ubah - ID ' . $item->id . '" onclick="return showModalBox(\'Edit Bank Tujuan\',\'' . route('bank-tujuan.edit', $item->id) . '\')"  type="button" class="btn btn-sm btn-warning btn-icon-only mr-1 rounded-circle">
                      <span class="btn-inner--icon"><i style="font-size: 10px" class="fas fa-edit"></i></span>
                    </button>';
                })
                ->make(true);
        }

        $table = $builder->ajax(route('bank-tujuan.index'))
            ->addAction(['title' => '', 'style' => 'width: 1%;'])
            ->addIndex(['title' => 'No.', 'style' => 'width: 1%;', 'class' => 'text-center'])
            ->addColumn(['data' => 'jenis_bank.nama', 'title' => 'Nama Bank'])
            ->addColumn(['data' => 'jenis_bank.kode', 'title' => 'Kode Bank', 'class' => 'text-center'])
            ->addColumn(['data' => 'nama', 'title' => 'Nama Rekening'])
            ->addColumn(['data' => 'no_rek', 'title' => 'No. Rekening']);


        return view('pages.penatausahaan.parameter.bank-tujuan.index', compact('table'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.penatausahaan.parameter.bank-tujuan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BankTujuanRequest $request)
    {

        BankTujuan::create($request->validated());

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
    public function edit(BankTujuan $bank_tujuan)
    {
        return view('pages.penatausahaan.parameter.bank-tujuan.edit', [
            'item' => $bank_tujuan
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BankTujuanRequest $request, BankTujuan $bank_tujuan)
    {
        $bank_tujuan->update($request->validated());

        return response()->json(['message' => 'Data berhasil diubah.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(BankTujuan $bank_tujuan)
    {
        $bank_tujuan->delete();

        return response()->json(['message' => 'Data berhasil dihapus.']);
    }
}
