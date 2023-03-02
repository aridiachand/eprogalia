<?php

namespace App\Http\Controllers;

use App\Models\JabatanApprovalLevel;
use App\Models\Pemilihanvendor;
use App\Models\Permintaan;
use App\Models\PermintaanDetail;
use App\Models\RangeApproveVendor;
use App\Models\Top;
use App\Models\Vendor;
use Carbon\Carbon;
use GuzzleHttp\Promise\Each;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\TryCatch;

class ApprovalvendorController extends Controller
{

    public function index()
    {
        $listapproval = JabatanApprovalLevel::all();
        return view('approval-vendor.index', compact('listapproval'));
    }

    public function data()
    {

        $permintaan = DB::select("SELECT CONCAT(p.kode_permintaan,'#',pd.split) as kode_permintaan_split  ,max(u.name) as nama_peminta ,max(b.nama) as nama_branch , max(d.department) as nama_department,  max(p.id_permintaan) as id_permintaan,p.kode_permintaan ,
        max(p.nama_permintaan) as nama_permintaan ,max(p.deskripsi) as deskripsi ,pd.split,
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
        max(pv.tanggal_selected_md) as tanggal_selected_md,
        max(pv.message_selected_md) as message_selected_md,
        max(pv.selected_presdir) as selected_presdir,
        max(pv.tanggal_selected_presdir) as tanggal_selected_presdir,
        max(pv.message_selected_presdir) as message_selected_presdir,
        max(pv.selected_owner) as selected_owner,
        max(pv.tanggal_selected_owner) as tanggal_selected_owner,
        max(pv.message_selected_owner) as message_selected_owner,
        max(pv.selected_dir_ho) as selected_dir_ho,
        max(pv.message_selected_dir_ho) as message_selected_dir_ho,
        max(pv.tanggal_selected_dir_ho) as tanggal_selected_dir_ho
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
          where pd.split <>''
          group by p.kode_permintaan,pd.split");

        // $listapproval = JabatanApprovalLevel::all();

        return datatables()
            ->of($permintaan)
            ->addIndexColumn()
            ->addColumn('aksi', function ($permintaan) {
                return '<button onClick="deleteData(`' . route('permintaan.destroy', $permintaan->id_permintaan . '#' . $permintaan->split) . '`)" class="btn btn-xs btn-danger btn-flat"><i class="mdi mdi-delete"></i></button><button onClick="window.location =(`' . route('permintaan.detaildata', encrypt($permintaan->id_permintaan)) . '`)" class="btn btn-xs btn-success btn-flat"><i class="mdi mdi-eye"></i></button>';
            })

            ->addColumn('joinsplit', function ($permintaan) {
                return $permintaan->kode_permintaan . '#' . $permintaan->split;
            })
            ->addColumn('status', function ($permin) {

                $status = '<button class="btn btn-xs btn-secondary btn-flat"><i class="mdi mdi-minus"></i></button>';
                return $status;
            })
            ->addColumn('approve', function ($permintaan) {
                $approve = '<button onClick="window.location =(`' . route('management.approve', encrypt($permintaan->kode_permintaan . '#' . $permintaan->split)) . '`)" class="btn btn-xs btn-blue btn-flat"><i class="mdi mdi-eye text-white"></i></button>';
                return $approve;
            })

            ->addColumn('txp', function ($permintaan) {
                $select = 'selected_technical_expert';
                if ($permintaan->$select == 1) {
                    $status = '<button class="btn btn-xs btn-success btn-flat"><i class="mdi mdi-check text-white"></i></button>';
                } elseif ($permintaan->$select == 3) {
                    $status = '<button class="btn btn-xs btn-warning btn-flat"><i class="mdi mdi-pause text-white"></i></button>';
                } else {
                    $status = '<button class="btn btn-xs btn-secondary btn-flat"><i class="mdi mdi-minus text-white"></i></button>';
                }

                return $status;
            })

            ->addColumn('gmh', function ($permintaan) {
                $select = 'selected_gm_ho';
                if ($permintaan->$select == 1) {
                    $status = '<button class="btn btn-xs btn-success btn-flat"><i class="mdi mdi-check text-white"></i></button>';
                } elseif ($permintaan->$select == 3) {
                    $status = '<button class="btn btn-xs btn-warning btn-flat"><i class="mdi mdi-pause text-white"></i></button>';
                } else {
                    $status = '<button class="btn btn-xs btn-secondary btn-flat"><i class="mdi mdi-minus text-white"></i></button>';
                }

                return $status;
            })

            ->addColumn('fat', function ($permintaan) {
                $select = 'selected_gm_fat';
                if ($permintaan->$select == 1) {
                    $status = '<button class="btn btn-xs btn-success btn-flat"><i class="mdi mdi-check text-white"></i></button>';
                } elseif ($permintaan->$select == 3) {
                    $status = '<button class="btn btn-xs btn-warning btn-flat"><i class="mdi mdi-pause text-white"></i></button>';
                } else {
                    $status = '<button class="btn btn-xs btn-secondary btn-flat"><i class="mdi mdi-minus text-white"></i></button>';
                }

                return $status;
            })

            ->addColumn('md', function ($permintaan) {
                $select = 'selected_md';
                if ($permintaan->$select == 1) {
                    $status = '<button class="btn btn-xs btn-success btn-flat"><i class="mdi mdi-check text-white"></i></button>';
                } elseif ($permintaan->$select == 3) {
                    $status = '<button class="btn btn-xs btn-warning btn-flat"><i class="mdi mdi-pause text-white"></i></button>';
                } else {
                    $status = '<button class="btn btn-xs btn-secondary btn-flat"><i class="mdi mdi-minus text-white"></i></button>';
                }

                return $status;
            })

            ->addColumn('prsd', function ($permintaan) {
                $select = 'selected_presdir';
                if ($permintaan->$select == 1) {
                    $status = '<button class="btn btn-xs btn-success btn-flat"><i class="mdi mdi-check text-white"></i></button>';
                } elseif ($permintaan->$select == 3) {
                    $status = '<button class="btn btn-xs btn-warning btn-flat"><i class="mdi mdi-pause text-white"></i></button>';
                } else {
                    $status = '<button class="btn btn-xs btn-secondary btn-flat"><i class="mdi mdi-minus text-white"></i></button>';
                }

                return $status;
            })

            ->addColumn('owner', function ($permintaan) {
                $select = 'selected_owner';
                if ($permintaan->$select == 1) {
                    $status = '<button class="btn btn-xs btn-success btn-flat"><i class="mdi mdi-check text-white"></i></button>';
                } elseif ($permintaan->$select == 3) {
                    $status = '<button class="btn btn-xs btn-warning btn-flat"><i class="mdi mdi-pause text-white"></i></button>';
                } else {
                    $status = '<button class="btn btn-xs btn-secondary btn-flat"><i class="mdi mdi-minus text-white"></i></button>';
                }

                return $status;
            })
            ->rawColumns(['aksi', 'joinsplit', 'status', 'approve', 'txp', 'gmh', 'fat', 'md', 'prsd', 'owner'])
            ->make(true);
    }




    public function managementapprove($id)
    {
        if ($id) {
            $idd = decrypt($id);
        } else {
            return redirect()->back();
        }

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

            $pemilihanvendor = Pemilihanvendor::where('kode_permintaan', $idd)->get();
            // $pemilihanvendor =  DB::table('pemilihan_vendor')->where('pemilihan_vendor.kode_permintaan', $idd)->leftjoin('checked_messagev', 'checked_messagev.id_pemilihan_vendor', '=', 'pemilihan_vendor.id')->get();

            $listapproval = JabatanApprovalLevel::all();

            // ==========================================================================================
            // dd(Auth::user()->id_user_jabatan_approve_vendor);

            $listvendor = DB::select("select pv.id_vendor as id_vendor , max(pv.nama_vendor) as nama_vendor,
            max(pv.nama_barang) as nama_barang,sum(pv.nilai_harga) as nilai_harga,
            sum(pd.jumlah) as jumlah, max(pv.kode_barang) as kode_barang  from permintaan_detail pd
            right join pemilihan_vendor pv
            on pv.kode_permintaan  = concat(pd.kode_permintaan,'#',pd.split)
            where pv.kode_barang = pd.kode_barang  and  concat(pd.kode_permintaan,'#',pd.split) = '$idd'
            group by pv.id_vendor order by id_vendor ");
            // ==========================================================================================

            $getfield = DB::select("select nama_field_pilih_vendor  from jabatan_approval_vendor jav
            where id =".Auth::user()->id_user_jabatan_approve_vendor);

            if($getfield){
                $getfield = $getfield[0]->nama_field_pilih_vendor;
                $selected = 'selected_'.$getfield;

                $listbarang = DB::select("select max($selected) as selected, pv.id,pv.nama_barang,pv.kode_barang,max(pv.id_vendor) as id_vendor ,max(pv.nama_vendor) as nama_vendor,
                sum(pd.harga_beli) as harga_beli,sum(pv.nilai_harga) as nilai_harga,
                sum(jumlah) as qty from permintaan_detail pd
                right join pemilihan_vendor pv
                on pv.kode_permintaan  = concat(pd.kode_permintaan,'#',pd.split)
                where pv.kode_barang = pd.kode_barang  and  concat(pd.kode_permintaan,'#',pd.split) = '$idd' group by pv.kode_barang,pv.nama_barang,pv.id order by max(pv.id_vendor)");
            }else{
                return redirect()->back()->with(['message','Anda tidak memiliki akses']);
            }


            $data = [
                'title' =>  'Select Vendor',
            ];

            $top = Top::all();

            return view('approval-vendor.management-approve', compact('permintaan', 'permintaandetail', 'vendor', 'pemilihanvendor', 'listapproval','listvendor','listbarang','top'));
        }
    }

    public function updateselected(Request $Request)
    {


        if ($Request->id_pilih_vendor) {
            $user = 'user';
            $tanggal = 'tanggal';
            $message = 'message';

            $selected = $Request->is_field_select;
            $userinput = $user . '_' . $selected;
            $messageinput = $message . '_' . $selected;
            $tanggalinput = $tanggal . '_' . $selected;

            $value_update = $Request->value_update;


            $kode_split = $Request->kode_split;
            $user_id = $Request->user_id;
            $note = $Request->note;
            // $resetinput =
            $pemilihanvendor = Pemilihanvendor::where('kode_permintaan', $kode_split)
                ->update([$selected => 0]);



            $update = $pemilihanvendor = Pemilihanvendor::find($Request->id_pilih_vendor);
            $pemilihanvendor->$selected = $value_update;
            $pemilihanvendor->$userinput = $user_id;
            $pemilihanvendor->$tanggalinput = now();
            $pemilihanvendor->$messageinput = $note;
            $pemilihanvendor->save();
            if ($update) {
                $cekfinish = Pemilihanvendor::where('kode_permintaan', $kode_split)->get();

                // $i=0;
                // foreach($data_chart as $row){
                //     $row->color = $color[$i];
                //     $i++;
                // }

                // for ($i = 0; $i < count($cekfinish); $i++) {
                //     $selected_technical_expert = 0;
                //     if ($cekfinish[$i] == 1) {
                //         $selected_technical_expert = 1;
                //         return;
                //     }
                // }

                // $i = 0;
                // foreach ($cekfinish as $cf) {
                //     if ($cf->selected_technical_expert == 1) {
                //         $selected_technical_expert = 1;
                //     }
                //     $i++;
                // }


                $i = 0;
                $selected_technical_expert = 0;
                $selected_gm_ho = 0;
                $selected_gm_fat = 0;
                $selected_dir_ho = 0;
                $selected_presdir = 0;
                $selected_owner = 0;
                foreach ($cekfinish as $cf) {

                    if ($cf->selected_technical_expert == 1) {
                        $selected_technical_expert = 1;
                    }


                    if ($cf->selected_gm_ho == 1) {
                        $selected_gm_ho = 1;
                    }


                    if ($cf->selected_gm_fat == 1) {
                        $selected_gm_fat = 1;
                    }


                    if ($cf->selected_dir_ho == 1) {
                        $selected_dir_ho = 1;
                    }


                    if ($cf->selected_presdir == 1) {
                        $selected_presdir = 1;
                    }


                    if ($cf->selected_owner == 1) {
                        $selected_owner = 1;
                    }

                    $i++;
                }

                // if ($selected_technical_expert == 1 and $selected_gm_ho == 1 and $selected_gm_fat == 1 and $selected_dir_ho == 1 and $selected_presdir == 1 and $selected_owner == 1) {
                //     $pv = Pemilihanvendor::where('kode_permintaan', '=', $kode_split)->update(array('finish' => 1));
                // }

                $sumharga = Pemilihanvendor::where('kode_permintaan', $kode_split)->sum('nilai_harga');
                $rangeapprovevendor = RangeApproveVendor::where('selected_field', $selected)->where('min', '<', $sumharga)->where('max', '>', $sumharga)->get();
                if ($rangeapprovevendor) {
                    try {
                        Pemilihanvendor::where('kode_permintaan', '=', $kode_split)->update(array('finish' => 0));
                    } catch (\Throwable $th) {
                        return response()->json(['error' => 'update gagal!']);
                    }

                    $updatewhererange = Pemilihanvendor::find($Request->id_pilih_vendor);
                    $updatewhererange->finish = 1;
                    $updatewhererange->save();
                }
                // return 'ok';
                return response()->json(['success' => 'update berhasil!']);
            } else {
                return response()->json(['error' => 'data tidak di temukan', $update]);
            }
        } else {
            return response()->json(['error' => 'update gagal!']);
        }
    }

    public function viewselectednote(Request $request)
    {
        $m = 'message_';
        $t = 'tanggal_';

        $message = $m . $request->field . ' as message';
        $tanggal = $t . $request->field . ' as tgl_message';

        $selectview = Pemilihanvendor::select($message, $tanggal)->where('id', $request->id)->get();
        // $selectview = Pemilihanvendor::where('id', $request->id)->get();
        return response()->json(['data' => $selectview[0], 'message' => $message, 'tanggal' => $tanggal]);
    }


    public function selected(Request $request){

        if($request->id){
            $id = intval($request->id);
            $noPbj = $request->noPbj;
            $kdBarang = $request->kdBarang;
            $idVendor = intval($request->idVendor);

            // return $idVendor;

            $usercheck = Auth::user()->id;
            $id_jabatan_approve_vendor = Auth::user()->id_user_jabatan_approve_vendor;
            if(!$id_jabatan_approve_vendor){
                return response()->json(['error' => 'anda tidak memiliki akses!']);
            }else{

                $getfield = DB::select("select nama_field_pilih_vendor  from jabatan_approval_vendor jav
                where id =".Auth::user()->id_user_jabatan_approve_vendor);


                $getfield = $getfield[0]->nama_field_pilih_vendor;

                $selected = 'selected_'.$getfield;
                $user_selected = 'user_selected_'.$getfield;
                $tanggal_selected = 'tanggal_selected_'.$getfield;
                $message_selected = 'message_selected_'.$getfield;

                DB::beginTransaction();
                try {
                    DB::table('pemilihan_vendor')
                        ->where('kode_permintaan', $noPbj)
                        ->where('kode_barang',$kdBarang)
                        // ->where('id_vendor',$idVendor)
                        // ->where($selected,1)
                        ->update([$selected => 0]);

                    DB::table('pemilihan_vendor')
                        ->where('id', $id)
                        ->update([$selected => 1]);

                    DB::commit();
                        return response()->json(['message' => 'updated']);
                } catch (\Exception $exception) {
                    DB::rollBack();
                    return $this->exceptionResponse($exception);
                }

                // if($resetcheck){
                    // DB::table('pemilihan_vendor')
                    // ->where('id', $id)
                    // ->update([$selected => 1]);
                    // return response()->json(['message' => 'updated']);
                // }else{
                //     return response()->json(['error' => 'gagal update']);
                // }

            }

        }else{
            return response()->json(['error' => 'data tidak di temukan']);
        }
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
