<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;
use App\Models\KategoriDetail;
use App\Models\KategoriTipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategori = Kategori::all()->pluck('nama_kategori', 'id_kategori');
        $kategori_detail = KategoriDetail::all()->pluck('nama_kategori_detail', 'id_kategori_detail');
        $kategori_tipe = KategoriTipe::all()->pluck('kode_kategori_tipe', 'id_kategori_tipe');

        return view('barang.index', compact('kategori', 'kategori_detail', 'kategori_tipe'));
    }


    public function data()
    {
        $barang = DB::select('select *,(select nama_kategori from kategori k where k.id_kategori = b.id_kategori  ) as nama_kategori,(select nama_kategori_detail from kategori_detail kd where kd.id_kategori_detail = b.id_kategori_detail  ) as nama_kategori_detail ,(select name from users u where u.id = b.id_user_input  ) as nama_user_input  from barang b order by id_barang desc');
        // $barang = Barang::orderBy('id_barang', 'desc');

        return datatables()
            ->of($barang)
            ->addIndexColumn()
            ->addColumn('aksi', function ($barang) {
                return '<button onClick="editForm(`' . route('barang.update', $barang->id_barang) . '`)" class="btn btn-xs btn-info btn-flat"><i class="mdi mdi-lead-pencil"></i></button><button onClick="deleteData(`' . route('barang.destroy', $barang->id_barang) . '`)" class="btn btn-xs btn-danger btn-flat"><i class="mdi mdi-delete"></i></button>';
            })
            ->rawColumns(['aksi'])
            ->make(true);
        // return datatables()->eloquent($barang)->toJson();
        // return datatables($barang)->toJson();
    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $kategori_tipe = KategoriTipe::find($request->id_kategori_tipe);
        // $barang = Barang::latest()->first();
        $b = Barang::latest()->first();
        if (!$b) {
            $barang = 1;
        } else {
            $barang = $b->id_barang;
        }

        $kode_barang = $kategori_tipe->kode_kategori_tipe . generate_kode_barang($barang);

        $id_kategori = intval($request->id_kategori);
        $id_kategori_detail = intval($request->id_kategori_detail);

        // $kode_barang = Str::random(8);

        $barang = new Barang();
        $barang->id_kategori = $id_kategori;
        $barang->id_kategori_detail = $id_kategori_detail;
        $barang->id_kategori_tipe = $request->id_kategori_tipe;
        $barang->kode_barang = $kode_barang;
        $barang->nama_barang = $request->nama_barang;
        $barang->merk_barang = $request->merk_barang;
        $barang->rutin = $request->rutin;
        $barang->id_user_input = Auth::id();
        $barang->save();

        return $kode_barang;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $barang = Barang::find($id);

        return response()->json($barang);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $barang = Barang::find($id);
        $barang->nama_barang = $request->nama_barang;
        $barang->update();

        return response()->json('Berhasil di update', 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $barang = Barang::find($id);
        $barang->delete();

        return response(null, 204);
    }
}
