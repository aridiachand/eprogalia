<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\KategoriDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('kategori.index');
    }


    public function data()
    {
        // $kategori = DB::table('kategori');
        $kategori = Kategori::orderBy('id_kategori', 'desc');

        return datatables()
            ->of($kategori)
            ->addIndexColumn()
            ->addColumn('aksi', function ($kategori) {
                return '<button onClick="editForm(`' . route('kategori.update', $kategori->id_kategori) . '`)" class="btn btn-xs btn-info btn-flat"><i class="mdi mdi-lead-pencil"></i></button><button onClick="deleteData(`' . route('kategori.destroy', $kategori->id_kategori) . '`)" class="btn btn-xs btn-danger btn-flat"><i class="mdi mdi-delete"></i></button>';
            })
            ->rawColumns(['aksi'])
            ->make(true);
        // return datatables()->eloquent($kategori)->toJson();
        // return datatables($kategori)->toJson();
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
        $kategori = new Kategori();
        $kategori->nama_kategori = $request->nama_kategori;
        $kategori->id_user_input = Auth::id();
        $kategori->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kategori = Kategori::find($id);

        return response()->json($kategori);
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
        $kategori = Kategori::find($id);
        $kategori->nama_kategori = $request->nama_kategori;
        $kategori->update();

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
        $kategori = Kategori::find($id);
        $kategori->delete();

        return response(null, 204);
    }


    // detail ===========================================================
    public function detail()
    {
        $kategori = Kategori::all();
        return view('kategori.detail')->with('kategori', $kategori);
    }

    public function kategori_detail_store(Request $request)
    {
        $id_kategori = intval($request->id_kategori);

        $kategori = new KategoriDetail();
        $kategori->id_kategori = $id_kategori;
        $kategori->nama_kategori_detail = $request->nama_kategori_detail;
        $kategori->save();

        return response()->json('masup detail', 200);
    }

    public function kategori_detail_data()
    {
        $kategori = DB::select('select *,(select nama_kategori from kategori k where k.id_kategori = kd.id_kategori  ) as nama_kategori  from kategori_detail kd order by nama_kategori');
        // $kategori = KategoriDetail::orderBy('id_kategori_detail', 'desc');
        // dd($kategori);

        return datatables()
            ->of($kategori)
            ->addIndexColumn()
            ->addColumn('aksi', function ($kategori) {
                return '<button onClick="editForm(`' . route('kategori.update', $kategori->id_kategori_detail) . '`)" class="btn btn-xs btn-info btn-flat"><i class="mdi mdi-lead-pencil"></i></button><button onClick="deleteData(`' . route('kategori.destroy', $kategori->id_kategori_detail) . '`)" class="btn btn-xs btn-danger btn-flat"><i class="mdi mdi-delete"></i></button>';
            })
            ->rawColumns(['aksi'])
            ->make(true);
        // return datatables()->eloquent($kategori)->toJson();
        // return datatables($kategori)->toJson();
    }
}
