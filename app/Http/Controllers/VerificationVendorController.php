<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\JabatanApprovalLevel;
use App\Models\Pemilihanvendor;
use App\Models\PengajuanMasterBarang;
use App\Models\PermintaanDetail;
use App\Models\Vendor;
use App\Models\VendorTerpilih;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class VerificationVendorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('verification-vendor.index');
    }

    public function data()
    {
        // $where_range = 'and selected_owner = 1';

        $permintaan = DB::select("SELECT  p.kode_permintaan,
		p.nama_permintaan as nama_pbj,
		p.deskripsi as deskripsi_pbj,
		CONCAT(p.kode_permintaan,'#',pd.split) as kode_permintaan_split,
		max(p.branch_id) as branch_id,
		max(b.nama) as branch_name,
		max(d.id_department) as department_id,
		max(d.department) as department_name,
		max(u.id) as id_peminta,
		max(u.name) as nama_peminta,
		max(p.id_permintaan) as id_permintaan,
        max(p.nama_permintaan) as nama_permintaan,
        max(p.deskripsi) as deskripsi ,
        pd.split,
        pv.id_vendor,
        pv.nama_vendor,
        pv.nilai_harga,
        (select sum(nilai_harga) from pemilihan_vendor pv2 where pv2.kode_permintaan = kode_permintaan_split ) as total_nilai_harga,
        pv.down_payment,pv.file_path,
     	max(pv.selected_technical_expert) as selected_technical_expert,
		max(pv.tanggal_selected_technical_expert) as tanggal_selected_technical_expert,
		max(pv.message_selected_technical_expert) as message_selected_technical_expert,
		max(pv.selected_gm_ho) as selected_gm_ho,
		max(pv.tanggal_selected_gm_ho) as tanggal_selected_gm_ho,
		max(pv.message_selected_gm_ho) as message_selected_gm_ho,
		max(pv.selected_gm_fat) as selected_gm_fat,
		max(pv.tanggal_selected_gm_fat) as tanggal_selected_gm_fat,
		max(pv.message_selected_gm_fat) as message_selected_gm_fat,
		max(pv.selected_md) as selected_md,
		max(pv.selected_dir_ho) as selected_dir_ho,
		max(pv.message_selected_dir_ho) as message_selected_dir_ho,
		max(pv.tanggal_selected_dir_ho) as tanggal_selected_dir_ho,
		max(pv.tanggal_selected_presdir) as tanggal_selected_presdir,
		max(pv.message_selected_presdir) as message_selected_presdir,
		max(pv.selected_owner) as selected_owner,
		max(pv.tanggal_selected_owner) as tanggal_selected_owner,
		max(pv.message_selected_owner) as message_selected_owner
          FROM permintaan_detail pd
          LEFT JOIN permintaan p
          ON pd.id_permintaan = p.id_permintaan
          left join branch b
          on p.branch_id = b.id_branch
          left join department d
          on p.department_id = d.id_department
          left join users u
          on p.id_user_input = u.id
          left join pemilihan_vendor pv
          on CONCAT(p.kode_permintaan,'#',pd.split) = pv.kode_permintaan
          left join vendor_terpilih vt
          on CONCAT(p.kode_permintaan,'#',pd.split) = vt.kode_permintaan_split
          where pd.split <>'' and pv.finish = 1 and (vt.kode_permintaan_split is null or vt.kode_permintaan_split ='')
          group by p.kode_permintaan,pd.split,p.nama_permintaan,p.deskripsi,
          pv.id_vendor,pv.nama_vendor,pv.nilai_harga,pv.down_payment,pv.file_path,vt.kode_permintaan_split");

        return datatables()
            ->of($permintaan)
            ->addIndexColumn()
            ->addColumn('aksi', function ($permintaan) {

                return '<button onClick="window.location =(`' . route('verification-vendor.internal', encrypt($permintaan->kode_permintaan_split)) . '`)" class="btn btn-xs btn-success btn-flat"><i class="mdi mdi-eye"></i></button>';
            })
            ->addColumn('vendor', function ($permintaan) {

                return '<button onClick="window.location =(`' . route('permintaan.detaildata', encrypt($permintaan->id_permintaan)) . '`)" class="btn btn-xs btn-success btn-flat"><i class="mdi mdi-eye"></i></button>';
            })
            ->addColumn('hargatotal', function ($permintaan) {

                return '' . format_uang($permintaan->total_nilai_harga) . '';
            })
            ->rawColumns(['aksi', 'vendor', 'hargatotal'])
            ->make(true);
    }

    public function internal($id)
    {

        if ($id) {
            $idd = decrypt($id);
        } else {
            return redirect()->back();
        }

        // dd($idd);

        if (str_contains($idd, '#')) {
            $pieces = explode('#', $idd);
            $kode_permintaan = $pieces[0];
            $split = $pieces[1];

            $where = 'where kode_permintaan ="' . $kode_permintaan . '"';
            $wheresplit = 'where kode_permintaan ="' . $kode_permintaan . '" and split=' . $split;
            $pr = DB::select('select p.nama_tipe_permintaan,p.nama_prioritas_permintaan,p.nama_permintaan,p.nama_kategori_barang, p.approve_manager_peminta,p.kode_permintaan,p.created_at,DATE_FORMAT(p.created_at, "%d-%m-%Y") as created_at_format, p.id_permintaan,p.id_status_approve_reject ,(select name from users u where u.id = p.id_status_approve_reject  ) as user_status_approve_reject,(select name from users u where u.id = p.id_user_input  ) as nama_user_input,(select nama from branch b2  where b2.id_branch  = p.branch_id  ) as nama_branch,(select department from department d where d.id_department = p.department_id  ) as nama_department,p.deskripsi,(select name from users where id= p.id_user_input) as nama_user_inputs,p.tanggal_permintaan from permintaan p ' . $where . ' order by kode_permintaan desc');
            $permintaan = $pr[0];

            $permintaandetail = DB::select('select *,(select kode_satuan_barang from satuan_barang sb where id_satuan_barang = pd.id_satuan_barang) as nama_satuan_barang from permintaan_detail pd ' . $wheresplit . ' order by kode_barang');

            $vendor = Vendor::all();

            // $pemilihanvendor = Pemilihanvendor::where('kode_permintaan', $idd)->get();
            // $pemilihanvendor =  DB::table('pemilihan_vendor')->where('pemilihan_vendor.kode_permintaan', $idd)->leftjoin('checked_messagev', 'checked_messagev.id_pemilihan_vendor', '=', 'pemilihan_vendor.id')->get();
            $pemilihanvendor = DB::select("SELECT  p.kode_permintaan,
            p.nama_permintaan as nama_pbj,
            p.deskripsi as deskripsi_pbj,
            CONCAT(p.kode_permintaan,'#',pd.split) as kode_permintaan_split,
            max(p.branch_id) as branch_id,
            max(b.nama) as branch_name,
            max(d.id_department) as department_id,
            max(d.department) as department_name,
            max(u.id) as id_peminta,
            max(u.name) as nama_peminta,
            max(p.id_permintaan) as id_permintaan,
            max(p.nama_permintaan) as nama_permintaan,
            max(p.deskripsi) as deskripsi ,
            pd.split,
            pv.id_vendor,
            pv.nama_vendor,
            pv.nilai_harga,
            (select sum(nilai_harga) from pemilihan_vendor pv2 where pv2.kode_permintaan = kode_permintaan_split ) as total_nilai_harga,
            pv.down_payment,pv.file_path,
             max(pv.selected_technical_expert) as selected_technical_expert,
            max(pv.tanggal_selected_technical_expert) as tanggal_selected_technical_expert,
            max(pv.message_selected_technical_expert) as message_selected_technical_expert,
            max(pv.selected_gm_ho) as selected_gm_ho,
            max(pv.tanggal_selected_gm_ho) as tanggal_selected_gm_ho,
            max(pv.message_selected_gm_ho) as message_selected_gm_ho,
            max(pv.selected_gm_fat) as selected_gm_fat,
            max(pv.tanggal_selected_gm_fat) as tanggal_selected_gm_fat,
            max(pv.message_selected_gm_fat) as message_selected_gm_fat,
            max(pv.selected_md) as selected_md,
            max(pv.selected_dir_ho) as selected_dir_ho,
            max(pv.message_selected_dir_ho) as message_selected_dir_ho,
            max(pv.tanggal_selected_dir_ho) as tanggal_selected_dir_ho,
            max(pv.tanggal_selected_presdir) as tanggal_selected_presdir,
            max(pv.message_selected_presdir) as message_selected_presdir,
            max(pv.selected_owner) as selected_owner,
            max(pv.tanggal_selected_owner) as tanggal_selected_owner,
            max(pv.message_selected_owner) as message_selected_owner
              FROM permintaan_detail pd
              LEFT JOIN permintaan p
              ON pd.id_permintaan = p.id_permintaan
              left join branch b
              on p.branch_id = b.id_branch
              left join department d
              on p.department_id = d.id_department
              left join users u
              on p.id_user_input = u.id
              left join pemilihan_vendor pv
              on CONCAT(p.kode_permintaan,'#',pd.split) = pv.kode_permintaan
              where pd.split <>'' and pv.finish = 1 and CONCAT(p.kode_permintaan,'#',pd.split) = '$idd'
              group by p.kode_permintaan,pd.split,p.nama_permintaan,p.deskripsi,
              pv.id_vendor,pv.nama_vendor,pv.nilai_harga,pv.down_payment,pv.file_path");


            $listapproval = JabatanApprovalLevel::all();

            $masterbarang = Barang::all();

            $data = [
                'title' =>  'Select Vendor',
            ];

            return view('verification-vendor.internal-update', compact('permintaan', 'permintaandetail', 'pemilihanvendor', 'masterbarang'));
        }
    }

    public function create()
    {
        return 'create';
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $kb = $request->kode_barang;
        foreach ($kb as $row => $key) {
            $vendor_terpilih = new VendorTerpilih();
            $vendor_terpilih->kode_permintaan = $request->kode_permintaan;
            $vendor_terpilih->kode_permintaan_split = $request->kode_permintaan_split;
            $vendor_terpilih->id_vendor = $request->id_vendor;
            $vendor_terpilih->nama_vendor = $request->nama_vendor;
            $vendor_terpilih->nilai_vendor = $request->nilai_vendor;
            $vendor_terpilih->dp_vendor = $request->dp_vendor;

            $vendor_terpilih->kode_barang = $request->kode_barang[$row];
            $vendor_terpilih->nama_barang = $request->nama_barang[$row];

            $vendor_terpilih->nilai_barang_update = $request->update_nilai_barang[$row];
            $vendor_terpilih->kode_barang_update = $request->update_kode_barang[$row];
            $vendor_terpilih->nama_barang_update = $request->update_nama_barang[$row];

            $vendor_terpilih->id_user_update = Auth::id();
            $vendor_terpilih->save();
        }
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
}
