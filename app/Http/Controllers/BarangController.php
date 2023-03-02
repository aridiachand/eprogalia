<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Commodity;
use App\Models\Kategori;
use App\Models\KategoriBarang;
use App\Models\KategoriDetail;
use App\Models\KategoriTipe;
use App\Models\Materialgroup;
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
        $kategori_barang = KategoriBarang::all()->pluck('nama_kategori_barang', 'id_kategori_barang');
        $commodity = Commodity::all();
        $material_group = Materialgroup::all();

        return view('barang.index', compact('kategori', 'kategori_detail', 'kategori_barang','commodity','material_group'));
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
        // return $request->all();
        $namapremasterbarang = $request->nama_barang;


        if($request->premasterbarang == 'on'){


            if(substr($request->nama_barang,-5) == '(Pre)' or substr($request->nama_barang,-5) == '(pre)' or substr($request->nama_barang,-5) == '(PRE)'){
                $request['nama_barang'] = $namapremasterbarang;
            }else{
                $request['nama_barang'] = $namapremasterbarang.'(Pre)';
            }
        }

        // return $request->nama_barang;
        $kategori_barang = KategoriBarang::find($request->id_kategori_barang);
        $like = '%'.$kategori_barang->kode_kategori_barang.'%';
        $katlength = strlen($kategori_barang->kode_kategori_barang);
        // $barang = Barang::where('kode_barang','LIKE','%'.$kategori_barang->kode_kategori_barang.'%');

        $b = DB::select("select max(kode_barang) as kode from barang where kode_barang like '$like' ORDER BY kode_barang LIMIT 1");
        // return str_split($barang[0]->kode,$katlength);
        // return explode($kategori_barang->kode_kategori_barang,$barang[0]->kode);

        if (!$b) {
            $barang = 1;
        } else {
            if(empty($b[0]->kode)){
                $barang = 1;
            }else{
                $barang = strval(substr($b[0]->kode,$katlength)+1);
            }
        }

        $kode_barang = $kategori_barang->kode_kategori_barang . generate_kode_barang($barang);

        $id_kategori = intval($request->id_kategori);
        $id_kategori_detail = intval($request->id_kategori_detail);

        // $kode_barang = Str::random(8);
        $barang = new Barang();
        $barang->id_kategori = $id_kategori;
        $barang->id_kategori_detail = $id_kategori_detail;
        $barang->id_kategori_barang = $request->id_kategori_barang;
        $barang->kode_barang = $kode_barang;
        $barang->nama_barang = $request->nama_barang;
        $barang->merk_barang = 0;
        $barang->rutin = 0;
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

    public function autocompleteSearch(Request $request)
    {
        // return $request->search;
        if($request->search){
            $query = $request->search;
            //   $query = $request->get('query');
            $filterResult = DB::select("select *,
            (select kode_satuan_barang  from satuan_barang sb where id_satuan_barang = b.id_satuan_kecil)
            as nama_satuan_barang from barang b where b.id_barang = $query");
            return response()->json($filterResult);
        }else{
            return response()->json(['msg'=>'data tidak di temukan']);
        }
    }

    public function selectSearch(Request $request)
    {
        $request->all();
    	$getbarang = [];
        if($request->has('q')){
            $search = $request->q;
            // $getbarang = Barang::where('nama_barang', 'LIKE', '%'. $search. '%')->get();
            $getbarang = DB::select("select *,
            (select kode_satuan_barang  from satuan_barang sb where id_satuan_barang = b.id_satuan_kecil)
            as nama_satuan_barang from barang b where b.nama_barang LIKE '%$search%'");
        }
        return response()->json($getbarang);


    }



}
