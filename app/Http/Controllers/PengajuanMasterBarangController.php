<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Branch;
use App\Models\Commodity;
use App\Models\PengajuanMasterBarang;
use Carbon\Carbon;
use Illuminate\Console\View\Components\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PengajuanMasterBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $commodity = Commodity::all();
        return view('pengajuan-master-barang.index',compact('commodity'));
    }

    public function listrequestinv()
    {
        // $masterbarang = Barang::all();
        return view('pengajuan-master-barang.listrequestinv');
    }

    public function data()
    {
        // $barang = DB::select('select *,(select nama_kategori from kategori k where k.id_kategori = b.id_kategori  ) as nama_kategori,(select nama_kategori_detail from kategori_detail kd where kd.id_kategori_detail = b.id_kategori_detail  ) as nama_kategori_detail ,(select name from users u where u.id = b.id_user_input  ) as nama_user_input  from barang b order by id_barang desc');
        $pengajuanmasterbarang = PengajuanMasterBarang::all();

        return datatables()
            ->of($pengajuanmasterbarang)
            ->addIndexColumn()
            ->addColumn('status', function ($pengajuanmasterbarang) {
                if($pengajuanmasterbarang->status == 2){
                    $status = 'Req to inv';
                }else{
                    $status = '';
                }
                return $status;
            })
            ->rawColumns(['aksi'])
            ->addColumn('aksi', function ($pengajuanmasterbarang) {

            if(Auth::user()->level == 99){
                if($pengajuanmasterbarang->status == 2){
                    $edit = '<button onClick="checkForm(`' . route('pengajuan-master-barang.check', ['master_id'=>$pengajuanmasterbarang->id,'namabarang'=>$pengajuanmasterbarang->namabarang]) . '`)" class="btn btn-xs btn-success btn-flat" disabled><i class="mdi mdi-playlist-check"></i></button>';
                    $update_asset = '';
                }else{
                    $edit = '<button onClick="checkForm(`' . route('pengajuan-master-barang.check', ['master_id'=>$pengajuanmasterbarang->id,'namabarang'=>$pengajuanmasterbarang->namabarang]) . '`)" class="btn btn-xs btn-success btn-flat"><i class="mdi mdi-playlist-check"></i></button>';
                    $update_asset = '<button onClick="reqToInventory(`' . route('pengajuan-master-barang.toinventory.request', ['master_id'=>$pengajuanmasterbarang->id,'namabarang'=>$pengajuanmasterbarang->namabarang]) . '`)" class="btn btn-xs btn-alia btn-flat"><i class="mdi mdi-call-made"></i></button>';
                }
            }else{
                $edit = '';
                $update_asset = '';
            }

                // }elseif(Auth::user()->level == 99){
                // }else{
                //     $edit = '';
                // }
                // $update_asset = '<button onClick="editForm(`' . route('pengajuan-master-barang.edit', $pengajuanmasterbarang->id) . '`)" class="btn btn-xs btn-info btn-flat"><i class="mdi mdi-lead-pencil"></i></button>';

                return $edit.$update_asset;
            })
            ->rawColumns(['status', 'aksi'])
            ->make(true);
        // return datatables()->eloquent($pengajuanmasterbarang)->toJson();
        // return datatables($pengajuanmasterbarang)->toJson();
    }

    public function datareqinv()
    {
        // $barang = DB::select('select *,(select nama_kategori from kategori k where k.id_kategori = b.id_kategori  ) as nama_kategori,(select nama_kategori_detail from kategori_detail kd where kd.id_kategori_detail = b.id_kategori_detail  ) as nama_kategori_detail ,(select name from users u where u.id = b.id_user_input  ) as nama_user_input  from barang b order by id_barang desc');
        $pengajuanmasterbarang = PengajuanMasterBarang::where('status',2);

        return datatables()
            ->of($pengajuanmasterbarang)
            ->addIndexColumn()
            ->addColumn('status', function ($pengajuanmasterbarang) {
                return '';
            })
            ->rawColumns(['aksi'])
            ->addColumn('aksi', function ($pengajuanmasterbarang) {

                // if(Auth::user()->level == 1){
                if($pengajuanmasterbarang->status == 2){
                    $edit = '<button onClick="invForm(`' . route('pembuatan-master-barang.pre', ['master_id'=>$pengajuanmasterbarang->id,'namabarang'=>$pengajuanmasterbarang->namabarang]) . '`)" class="btn btn-xs btn-success btn-flat"><i class="mdi mdi-playlist-check"></i></button>';
                    $update_asset = '';
                }elseif($pengajuanmasterbarang->status == 1){
                    $edit = '<button onClick="checkForm(`' . route('pengajuan-master-barang.check', ['master_id'=>$pengajuanmasterbarang->id,'namabarang'=>$pengajuanmasterbarang->namabarang]) . '`)" class="btn btn-xs btn-success btn-flat"><i class="mdi mdi-playlist-check"></i></button>';
                    $update_asset = '<button onClick="reqToInventory(`' . route('pengajuan-master-barang.toinventory.request', ['master_id'=>$pengajuanmasterbarang->id,'namabarang'=>$pengajuanmasterbarang->namabarang]) . '`)" class="btn btn-xs btn-alia btn-flat"><i class="mdi mdi-call-made"></i></button>';
                }

                // if($pengajuanmasterbarang->status == 2){
                //     return $edit;
                // }

                // }elseif(Auth::user()->level == 99){
                // }else{
                //     $edit = '';
                // }
                // $update_asset = '<button onClick="editForm(`' . route('pengajuan-master-barang.edit', $pengajuanmasterbarang->id) . '`)" class="btn btn-xs btn-info btn-flat"><i class="mdi mdi-lead-pencil"></i></button>';

                return $edit.$update_asset;
            })
            ->rawColumns(['status', 'aksi'])
            ->make(true);
        // return datatables()->eloquent($pengajuanmasterbarang)->toJson();
        // return datatables($pengajuanmasterbarang)->toJson();
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

        $tanggal = Carbon::now()->isoFormat('DDMMYY');
        $namabranch =  Branch::where('id_branch', Auth::user()->id_branch)->pluck('branch');

        $p = DB::table('pengajuan_master_barang')->latest('no_pengajuan')->first();
        // ($p) ? $substr = substr($p->no_pengajuan, strrpos($p->no_pengajuan, '-') + 1) : $substr = 0;
        ($p) ? $substr = substr($p->no_pengajuan, -5) : $substr = 0;
        $no = intval($substr) + 1;

        $pmb = pengajuan_master_barang($no, $namabranch[0], $tanggal);

        $pengajuanmaster = new PengajuanMasterBarang();
        $pengajuanmaster->no_pengajuan = $pmb;
        $pengajuanmaster->nama_barang = $request->nama_barang;
        $pengajuanmaster->save();
        return 'oke';
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function check(Request $request)
    {
        if($request->master_id){
            $pengajuanbr = PengajuanMasterBarang::find($request->master_id);
            return $pengajuanbr;
        }else{
            return 'kosong';
        }

    }

    public function toinventoryrequestsimpan(Request $request)
    {
        // return $request->all();

        if($request->all()){
            DB::table('pengajuan_master_barang')
            ->where('id',$request->id)
            ->update([
                'id_suggest_nama_barang'=>$request->idbarangsuggest,
                'suggest_nama_barang'=>$request->nambarangsuggest,
                'suggest_harga_barang'=>$request->hargabarangsuggest,
                'status'=>intval($request->status),
            ]);

            return response(['message'=>'data berhasil di update']);
        }

    }



    public function toinventoryrequest(Request $request)
    {
        // add flag 1 to status
        // jika 2 di arahkan ke invontory asset

        if($request->all()){
            DB::table('pengajuan_master_barang')
            ->where('id',$request->master_id)
            ->update([
                // 'id_suggest_nama_barang'=>$request->idbarangsuggest,
                // 'suggest_nama_barang'=>$request->nambarangsuggest,
                // 'suggest_harga_barang'=>$request->hargabarangsuggest,
                'status'=>intval(2),
            ]);

            return response(['message'=>'data berhasil di update']);
        }
    }

    public function createpre(Request $request)
    {
        // return 'ok';

        if($request->master_id){
            $pengajuanbr = PengajuanMasterBarang::find($request->master_id);
            return $pengajuanbr;
        }else{
            return 'kosong';
        }
    }
}
