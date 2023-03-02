<?php

namespace App\Http\Controllers;

use App\Models\Pemilihanvendor;
use App\Models\Permintaan;
use App\Models\PermintaanDetail;
use App\Models\Top;
use App\Models\User;
use App\Models\Vendor;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

use function PHPUnit\Framework\isNull;

class PemilihanApprovalController extends Controller
{

    public function index()
    {
        return view('pemilihan-approval.index');
    }

    public function data()
    {
        $mintech = min_tech_expert();
        // $permintaan = Permintaan::orderBy('id_permintaan', 'desc');
        // $permintaan = DB::select("select *,
        // DATE_FORMAT(tanggal_permintaan, '%d-%m-%Y') as t_permintaan from permintaan
        // where (approve_direktur_rs = 1 and total_harga <= ' . $mintech . ' )
        // or (approve_gm_fat = 1 and total_harga > ' . $mintech . ')  order by updated_at DESC");
        $permintaan = DB::select("select p.id_permintaan,max(split) as split,pd.kode_permintaan,p.nama_tipe_permintaan,p.nama_prioritas_permintaan,
        p.total_item,p.total_harga,p.nama_permintaan,DATE_FORMAT(p.tanggal_permintaan, '%d-%m-%Y') as t_permintaan
        from permintaan_detail pd
        left join permintaan p on p.kode_permintaan = pd.kode_permintaan
        where pd.split = 0 and ((p.approve_direktur_rs = 1 and p.total_harga <= '.$mintech.' ) or (p.approve_gm_fat = 1 and p.total_harga > '.$mintech.'))
        group by pd.split,kode_permintaan ,p.id_permintaan,p.nama_tipe_permintaan,p.nama_prioritas_permintaan,
        p.total_item,p.total_harga,p.nama_permintaan,p.tanggal_permintaan,p.approve_direktur_rs,p.approve_gm_fat,p.updated_at
        order by p.updated_at DESC");

        return datatables()
            ->of($permintaan)
            ->addIndexColumn()
            ->addColumn('aksi', function ($permintaan) {
                $addvendor = '<button onClick="window.location =(`' . route('pemilihan-approval.detaildata', encrypt($permintaan->id_permintaan)) . '`)" class="btn btn-xs btn-success btn-flat mx-1"><i class="mdi mdi-eye"></i></button>';
                $showStatus = '<button class="btn btn-xs btn-secondary btn-flat mx-1"><i class="mdi mdi-minus"></i></button>';
                return $addvendor;
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }

    public function selectvendor()
    {
        return view('pemilihan-approval.form-select-vendor');
    }

    public function split()
    {

        $permintansplit = DB::select('select max(p.id_permintaan) as id_permintaan,p.kode_permintaan ,max(p.nama_permintaan) as nama_permintaan ,max(p.deskripsi) as deskripsi ,pd.split from permintaan_detail pd LEFT JOIN permintaan p ON pd.id_permintaan = p.id_permintaan where pd.split <>"" group by p.kode_permintaan,pd.split ');

        return datatables()
            ->of($permintansplit)
            ->addIndexColumn()
            ->addColumn('joinsplit', function ($permintansplit) {
                $joinsplit = $permintansplit->kode_permintaan . '#' . $permintansplit->split;
                return $joinsplit;
            })
            ->addColumn('aksi', function ($permintansplit) {
                $addvendor = '<button onClick="window.location =(`' . route('pemilihan-approval.detaildata', encrypt($permintansplit->kode_permintaan . '#' . $permintansplit->split)) . '`)" class="btn btn-xs btn-success btn-flat mx-1"><i class="mdi mdi-eye"></i></button>';
                // $showStatus = '<button class="btn btn-xs btn-secondary btn-flat mx-1"><i class="mdi mdi-minus"></i></button>';
                return $addvendor;
            })
            ->addColumn('status', function ($permintansplit) {
                $status = '';
                // <span class="btn btn-xs text-center btn-secondary btn-flat fw-bold"><i class="mdi mdi-minus text-white text-center fw-bold"></i></span>

                return $status;
            })
            ->rawColumns(['aksi', 'joinsplit', 'status'])
            ->make(true);
    }

    public function save_split(Request $request)
    {
        // return $request->id_permintaan_detail;
        $kode_permintaan = $request->kode_permintaan;

        $ceksplitpermintaandetail = PermintaanDetail::where('kode_permintaan', $kode_permintaan)->where('split', '<>', '')->latest('split')->first();
        if ($ceksplitpermintaandetail) {
            $threshold = 2;
            $nosplit = sprintf("%0" . $threshold . "s", $ceksplitpermintaandetail->split + 1);
            $permintaandetail = DB::table('permintaan_detail')->whereIn('id_permintaan_detail', $request->id_permintaan_detail)->update(array('split' => $nosplit));
        } else {
            $permintaandetail = DB::table('permintaan_detail')->whereIn('id_permintaan_detail', $request->id_permintaan_detail)->update(array('split' => '01'));
        };
        return $permintaandetail;

        // if ($request->id_permintaan_detail) {
        //     // $permintaandetail = PermintaanDetail::where('id_permintaan_detail',$request->id_permintaan_detail);
        //     $permintaandetail = DB::table('permintaan_detail')
        //         ->whereIn('id_permintaan_detail', $request->id_permintaan_detail)
        //         ->get();
        // }
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        // return $request->all();
        if(isNull($request->diskonpbjnominal)){
            $request['diskonpbjnominal'] = 0;
        }

        if(isNull($request->vat)){
            $request['vat'] = 0;
        }

        if(isNull($request->ongkir)){
            $request['ongkir'] = 0;
        }


        $data = array();
        $validator = Validator::make($request->all(), [
            // return 123;
            'file' => 'required|mimes:pdf|max:2048',
            // 'nama_file' => 'required',
            'id_vendor' => 'required',
            'nama_vendor' => 'required',
            'nilai_harga' => 'required',
            'down_payment' => 'required',
            // 'file' => 'required|mimes:png,jpg,jpeg,csv,txt,pdf|max:2048'
        ]);

        if ($validator->fails()) {
            // return 321;
            $data['success'] = 0;
            $data['error'] = $validator->errors()->first('file'); // Error response
            // $data['error'] = $validator->errors()->first('nama_file'); // Error response
            $data['error'] = $validator->errors()->first('id_vendor'); // Error response
            $data['error'] = $validator->errors()->first('nama_vendor'); // Error response
            $data['error'] = $validator->errors()->first('nilai_harga'); // Error response
            $data['error'] = $validator->errors()->first('down_payment'); // Error response

        } else {
            // return 1234;
            if ($request->file('file')) {

                $file = $request->file('file');
                $filename = time() . '_' . $file->getClientOriginalName();

                // File extension
                $extension = $file->getClientOriginalExtension();

                // File upload location
                $location = 'files';

                // Upload file
                $file->move($location, $filename);

                // File path
                $filepath = url('files/' . $filename);

                // return $request->kode_barang;

                // return json_decode($request->kode_barang);
                // Response
                $data['success'] = 1;
                $data['message'] = 'Uploaded Successfully!';
                $data['extension'] = $extension;
                $data['file_path'] = $filepath;
                $data['attachment'] = $request->nama_file;
                $data['id_vendor'] = $request->id_vendor;
                $data['nama_vendor'] = $request->nama_vendor;
                $data['nilai_harga'] = intval($request->nilai_harga);
                $data['down_payment'] = $request->down_payment;
                $data['kode_barang'] = $request->kode_barang;
                $data['kode_permintaan'] = $request->kode_permintaan;
                $data['id_permintaan_detail'] = $request->id_permintaan_detail;

                if($request->tgl_quotation){
                    $request['tgl_quotation'] = Carbon::createFromFormat('d/m/Y', $request->tgl_quotation)->format('Y-m-d');
                }
                // $tgl_quotation = date_create($request->tgl_quotation);
                // return date("Y-m-d",strtotime($request->tgl_quotation));
                // return $request->tgl_quotation;
                // return Carbon::createFromFormat('d/m/Y', $request->tgl_quotation)->format('Y-m-d');

                    foreach ( $request->kode_barang as $row => $key) {
                        $pemilihanvendor = new Pemilihanvendor();
                        $pemilihanvendor->attachment = $file->getClientOriginalName();
                        $pemilihanvendor->kode_permintaan = $request->kode_permintaan;
                        $pemilihanvendor->id_permintaan_detail = $request->id_permintaan_detail;
                        $pemilihanvendor->id_permintaan = $request->id_permintaan;
                        $pemilihanvendor->file_path = $filepath;
                        $pemilihanvendor->id_vendor = $request->id_vendor;
                        $pemilihanvendor->nama_vendor = $request->nama_vendor;
                        $pemilihanvendor->id_top = $request->id_top;
                        $pemilihanvendor->keterangan_top = $request->ket_top;
                        $pemilihanvendor->tgl_quotation = $request->tgl_quotation;

                        $pemilihanvendor->totalarr = $request->totalarr;
                        $pemilihanvendor->subtotal = $request->subtotal;
                        $pemilihanvendor->vat = $request->vat;
                        $pemilihanvendor->ongkir = $request->ongkir;
                        $pemilihanvendor->grand_total = $request->grand_total;
                        $pemilihanvendor->delivery_time = $request->delivery_time;

                        $pemilihanvendor->diskon_per_pbj_nominal = $request->diskonpbjnominal;

                        $pemilihanvendor->kode_barang = $request->kode_barang[$row];
                        $pemilihanvendor->nama_barang = $request->nama_barang[$row];
                        $pemilihanvendor->nilai_harga = $request->nilai_harga[$row];
                        $pemilihanvendor->qty = $request->jumlah[$row];
                        $pemilihanvendor->save();
                    }

                // Pemilihanvendor::insert($data);
                // return $pemilihanvendor;

                // $pv = Pemilihanvendor::create([
                //     'attachment' => $request->nama_file,
                //     'file_path' => $filepath,
                //     'kode_permintaan' => $request->kode_permintaan,
                //     'id_vendor' => $request->id_vendor,
                //     'nama_vendor' => $request->nama_vendor,
                //     'id_permintaan' => $request->id_permintaan,
                //     'id_permintaan_detail' => $request->id_permintaan_detail,
                //     'kode_barang' => $request->kode_barang,
                //     'nama_barang' => $request->nama_barang,
                //     'nilai_harga' => $request->nilai_harga,
                //     'down_payment' => $request->down_payment,
                //     // 'id_user_upload' => Auth::user()->id,
                // ]);

                // if ($permintaan) {
                //     $kb = $request->kode_barang;
                //     foreach ($kb as $row => $key) {
                //         $permintaan_detail = new PermintaanDetail();
                //         $permintaan_detail->id_permintaan = $permintaan['id_permintaan'];
                //         $permintaan_detail->kode_permintaan = $request->kode_permintaan;
                //         $permintaan_detail->kode_barang = $request->kode_barang[$row];
                //         $permintaan_detail->nama_barang = $request->nama_barang[$row];
                //         $permintaan_detail->tipe_input = 0;
                //         $permintaan_detail->harga_beli = $request->harga_barang[$row];
                //         $permintaan_detail->jumlah = $request->jumlah[$row];
                //         $permintaan_detail->id_satuan_barang = $request->id_satuan_item[$row];
                //         $permintaan_detail->subtotal = $request->total[$row];
                //         $permintaan_detail->deskripsi = $request->keterangan_item[$row];
                //         $permintaan_detail->id_user_input = Auth::id();
                //         $permintaan_detail->save();
                //     }
                // }

                // if ($pv) {
                //     $data['success'] = 4;
                //     $data['message'] = 'Gagal upload';
                // } else {
                //     $data['success'] = 5;
                //     $data['message'] = 'Berhasil upload';
                // }
            } else {
                // Response
                $data['success'] = 2;
                $data['message'] = 'File not uploaded.';
            }
        }

        return response()->json($data);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }

    public function removevendor(Request $request)
    {
        if($request->all()){
            $remove = Pemilihanvendor::where('id_vendor', intval($request->idvendor))
            ->where('kode_permintaan', $request->nopbj)
            ->delete();

            return response()->json(['message'=>'data berhasil di hapus']);
        }else{
            return response()->json(['message'=>'data tidak di temukan']);
        }
    }

    public function detaildata($id)
    {
        $idd =  decrypt($id);
        // dd($idd);

        if (str_contains($idd, '#')) {
            $pieces = explode('#', $idd);
            $iddecrypt = $pieces[0];

            $splitdecrypt = $pieces[1];

            $where = 'where kode_permintaan ="' . $iddecrypt . '"';
            $wheresplit = 'where kode_permintaan ="' . $iddecrypt . '" and split=' . $splitdecrypt;
            $pr = DB::select('select p.nama_tipe_permintaan,p.nama_prioritas_permintaan,p.nama_permintaan,p.nama_kategori_barang, p.approve_manager_peminta,p.kode_permintaan,p.created_at,DATE_FORMAT(p.created_at, "%d-%m-%Y") as created_at_format, p.id_permintaan,p.id_status_approve_reject ,(select name from users u where u.id = p.id_status_approve_reject  ) as user_status_approve_reject,(select name from users u where u.id = p.id_user_input  ) as nama_user_input,(select nama from branch b2  where b2.id_branch  = p.branch_id  ) as nama_branch,(select department from department d where d.id_department = p.department_id  ) as nama_department,p.deskripsi,(select name from users where id= p.id_user_input) as nama_user_inputs,p.tanggal_permintaan from permintaan p ' . $where . ' order by kode_permintaan desc');
            $permintaan = $pr[0];

            // $permintaandetail = DB::select('select *,(select kode_satuan_barang from satuan_barang sb where id_satuan_barang = pd.id_satuan_barang) as nama_satuan_barang from permintaan_detail pd ' . $wheresplit . ' order by kode_barang');
            $permintaandetail = DB::select("select *,(select kode_satuan_barang from satuan_barang sb
            where id_satuan_barang = pd.id_satuan_barang) as nama_satuan_barang,
            pd.jumlah as qty_old,
            (select max(qty) as qty  from pemilihan_vendor pv
            where kode_permintaan = concat(pd.kode_permintaan,'#',pd.split)
            and kode_barang = pd.kode_barang
            group by kode_barang) as qty_new,
            IF((select max(qty) as qty  from pemilihan_vendor pv
            where kode_permintaan = concat(pd.kode_permintaan,'#',pd.split)
            and kode_barang = pd.kode_barang
            group by kode_barang) > 0 ,
            (select max(qty) as qty  from pemilihan_vendor pv
            where kode_permintaan = concat(pd.kode_permintaan,'#',pd.split)
            and kode_barang = pd.kode_barang
            group by kode_barang), pd.jumlah) as qty_update
            from permintaan_detail pd $wheresplit order by pd.kode_barang");

            // dd($permintaandetail);
            $vendor = Vendor::all();

            // $users = User::all();

            $pemilihanvendor = Pemilihanvendor::where('kode_permintaan', $idd)->get();
            // dd($pemilihanvendor);
            // $kp = 'DPK/310123/PBJ-0041#01';
            $pemilihanvendorgroup = DB::select('select id_vendor ,nama_vendor,kode_barang
            FROM pemilihan_vendor where kode_permintaan = "' .  $idd . '" group by id_vendor ,nama_vendor,kode_barang');

            $pemilihanvendorgroupdua = DB::select("select * from permintaan_detail pd
            right join pemilihan_vendor pv
            on pv.kode_permintaan  = concat(pd.kode_permintaan,'#',pd.split)
            where pv.kode_barang = pd.kode_barang and concat(pd.kode_permintaan,'#',pd.split) ='$idd'");

            // $coba = DB::select("SET @sql = NULL; SELECT GROUP_CONCAT(DISTINCT CONCAT('MAX(IF(nama_vendor = ', nama_vendor,', nilai_harga,'')) AS ',nama_vendor,'')) INTO @sql FROM pemilihan_vendor WHERE id_permintaan = 167;S ET @sql = CONCAT('SELECT  nama_barang,  ', @sql, ' FROM pemilihan_vendor s where id_permintaan = 167 GROUP BY s.nama_barang ORDER BY s.nama_barang'); #SELECT @sql; PREPARE stmt FROM @sql; EXECUTE stmt; DEALLOCATE stmt;");
            $listbarang = DB::select("select  pv.nama_barang,pv.kode_barang,max(pv.id_vendor) as id_vendor ,max(pv.nama_vendor) as nama_vendor,
            sum(pd.harga_beli) as harga_beli,sum(pv.nilai_harga) as nilai_harga,
            sum(jumlah) as qty from permintaan_detail pd
            right join pemilihan_vendor pv
            on pv.kode_permintaan  = concat(pd.kode_permintaan,'#',pd.split)
            where pv.kode_barang = pd.kode_barang  and  concat(pd.kode_permintaan,'#',pd.split) = '$idd' group by pv.kode_barang,pv.nama_barang,pv.id order by max(pv.id_vendor)");

            $listvendor = DB::select("select pv.id_vendor as id_vendor , max(pv.nama_vendor) as nama_vendor,
            max(pv.nama_barang) as nama_barang,sum(pv.nilai_harga) as nilai_harga,
            sum(pd.jumlah) as jumlah, max(pv.kode_barang) as kode_barang  from permintaan_detail pd
            right join pemilihan_vendor pv
            on pv.kode_permintaan  = concat(pd.kode_permintaan,'#',pd.split)
            where pv.kode_barang = pd.kode_barang  and  concat(pd.kode_permintaan,'#',pd.split) = '$idd'
            group by pv.id_vendor order by id_vendor ");

            $data = [
                'title' =>  'Select Vendor',
            ];

            $top = Top::all();

            return view('pemilihan-approval.list-splited', compact('permintaan', 'permintaandetail', 'vendor', 'pemilihanvendor', 'pemilihanvendorgroup', 'pemilihanvendorgroupdua', 'listvendor', 'listbarang','top'));
        } else {

            $where = 'where id_permintaan =' . $idd;
            $pr = DB::select('select p.nama_tipe_permintaan,p.nama_prioritas_permintaan,p.nama_permintaan,p.nama_kategori_barang, p.approve_manager_peminta,p.kode_permintaan,p.created_at,DATE_FORMAT(p.created_at, "%d-%m-%Y") as created_at_format, p.id_permintaan,p.id_status_approve_reject ,(select name from users u where u.id = p.id_status_approve_reject  ) as user_status_approve_reject,(select name from users u where u.id = p.id_user_input  ) as nama_user_input,(select nama from branch b2  where b2.id_branch  = p.branch_id  ) as nama_branch,(select department from department d where d.id_department = p.department_id  ) as nama_department,p.deskripsi,(select name from users where id= p.id_user_input) as nama_user_inputs,p.tanggal_permintaan from permintaan p ' . $where . ' order by kode_permintaan desc');

            $permintaan = $pr[0];

            // select hanya yang belum ada split
            $permintaandetail = DB::select('select *,(select kode_satuan_barang from satuan_barang sb where id_satuan_barang = pd.id_satuan_barang) as nama_satuan_barang from permintaan_detail pd ' . $where . ' and split="" order by kode_barang');



            $vendor = Vendor::all();
            $pemilihanvendor = Pemilihanvendor::all();
            // return $pemilihanvendor;

            $data = [
                'title' =>  'Pemilihan Vendor',
            ];

            return view('pemilihan-approval.form-pemilihan-split', compact('permintaan', 'permintaandetail', 'vendor', 'pemilihanvendor'));
        }
    }
}
