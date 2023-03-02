<?php

namespace App\Http\Controllers;

use App\Models\VendorTerpilih;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApprovedVendorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('approved-vendor.index');
    }


    public function data()
    {
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
          where pd.split <>'' and pv.finish = 1 and (vt.kode_permintaan_split is not null or vt.kode_permintaan_split <>'')
          group by p.kode_permintaan,pd.split,p.nama_permintaan,p.deskripsi,
          pv.id_vendor,pv.nama_vendor,pv.nilai_harga,pv.down_payment,pv.file_path,vt.kode_permintaan_split");

        return datatables()
            ->of($permintaan)
            ->addIndexColumn()
            ->addColumn('aksi', function ($permintaan) {

                return '<button onClick="window.location =(`' . route('verification-vendor.internal', encrypt($permintaan->kode_permintaan_split)) . '`)" class="btn btn-xs btn-success btn-flat"><i class="mdi mdi-eye"></i></button>';
            })

            ->addColumn('dropdown', function ($permintaan) {
                $div = "<div class='btn-group'>";
                $buttonheader = "<button type='button' class='text-white btn btn-success dropdown-toggle' data-bs-toggle='dropdown' aria-haspopup='true'
                aria-expanded='false'>Action</button>";
                $divclass =  "<div class='dropdown-menu'>";
                $preview = "<a class='dropdown-item' href='#'>Preview</a>";
                $spp = "<a class='dropdown-item' href='/surat-penetapan'>Surat Penetapan Panitia</a>";
                $quotation = "<a class='dropdown-item' href='#'>Quotation</a>";
                $buttonfooter = "</div></div>";

                return $div . $buttonheader . $divclass . $preview . $spp . $quotation . $buttonfooter;
            })


            ->addColumn('hargatotal', function ($permintaan) {

                return '' . format_uang($permintaan->total_nilai_harga) . '';
            })

            ->rawColumns(['aksi', 'dropdown', 'hargatotal'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        //
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
