<?php

namespace App\Http\Controllers;

use App\Models\Permintaan;
use App\Models\PermintaanDetail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ApprovalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('approval.index');
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
    // Auth::user()->level > 0
    public function data()
    {
        if (Auth::user()->level > 0) {
            if (Auth::user()->id_jabatan == 1 and Auth::user()->id_branch <> 1) {
                $where_id_user_input = 'where id_user_input=' . Auth::user()->id;
            } else {
                $where_id_user_input = 'where 1=1';
            }
        } else {
            $where_id_user_input = 'where 1=1';
        }

        $permintaan = DB::select("select *,DATE_FORMAT(tanggal_approve_manager_peminta,'%d-%m-%Y %T') as t_approve_manager_peminta,
        DATE_FORMAT(tanggal_approve_manager_keuangan_unit,'%d-%m-%Y') as t_approve_manager_keuangan_unit,
        DATE_FORMAT(tanggal_approve_direktur_rs,'%d-%m-%Y') as t_approve_direktur_rs,
        DATE_FORMAT(tanggal_permintaan,'%d-%m-%Y') as t_permintaan,
        (select name from users u where u.id = p.id_user_input  ) as nama_user_input,
        (select nama from branch b2  where b2.id_branch  = p.branch_id  ) as nama_branch,
        (select department from department d where d.id_department = p.department_id  ) as nama_department,
        (select status_approve from status_approve sa where sa.id_status_approve = p.id_status_approve_reject) as status_approve
        from permintaan p " . $where_id_user_input . "  order by tanggal_permintaan desc");

        return datatables()
            ->of($permintaan)
            ->addIndexColumn()
            ->addColumn('status', function ($permintaan) {
                if ($permintaan->approve_manager_peminta == 1) {
                    $managerpeminta = "<button class='btn btn-xs btn-success btn-flat'>MP</button>";
                } else {
                    $managerpeminta = "";
                }

                if ($permintaan->approve_manager_keuangan_unit == 1) {
                    $managerkeuanganunit = "<button class='btn btn-xs btn-success btn-flat'>MKU</button>";
                } else {
                    $managerkeuanganunit = "";
                }

                if ($permintaan->approve_direktur_rs == 1) {
                    $direkturrs = "<button class='btn btn-xs btn-success btn-flat'>DIR</button>";
                } else {
                    $direkturrs = "";
                }

                if ($permintaan->approve_procurement == 1) {
                    $procurement = "<button class='btn btn-xs btn-success btn-flat'>PROC</button>";
                } else {
                    $procurement = "";
                }

                if ($permintaan->approve_manager_procurement == 1) {
                    $approve = "<button class='btn btn-xs btn-success btn-flat'>MPROC</button>";
                } else {
                    $approve = $managerpeminta . $managerkeuanganunit . $direkturrs . $procurement;
                }

                return  $approve;
            })
            ->addColumn('aksi', function ($permintaan) {
                return '<button onClick="deleteData(`' . route('permintaan.destroy', $permintaan->id_permintaan) . '`)" class="btn btn-xs btn-danger btn-flat"><i class="mdi mdi-delete"></i></button></button><button onClick="window.location =(`' . route('permintaan.detaildata', encrypt($permintaan->id_permintaan)) . '`)" class="btn btn-xs btn-success btn-flat"><i class="mdi mdi-eye"></i></button>';
            })

            ->addColumn('approved_manager_peminta', function ($permintaan) {
                $appr = '';
                if ($permintaan->approve_manager_peminta == 1) {
                    $appr = '<button onclick="tglNotesView(`' . $permintaan->kode_permintaan . '`,1,`' . $permintaan->tanggal_approve_manager_peminta . '`,`' . $permintaan->note_manager_peminta . '`)" class="btn btn-xs text-center btn-success btn-flat fw-bold"><i class="mdi mdi-check text-white fw-bold"></i></button>';
                } elseif ($permintaan->approve_manager_peminta == 2) {
                    $appr = '<button onclick="tglNotesView(`' . $permintaan->kode_permintaan . '`,1,`' . $permintaan->tanggal_approve_manager_peminta . '`,`' . $permintaan->note_manager_peminta . '`)" class="btn btn-xs text-center btn-danger btn-flat fw-bold"><i class="mdi mdi-close text-white text-center fw-bold"></i></button>';
                } elseif ($permintaan->approve_manager_peminta == 3) {
                    $appr = '<button onclick="tglNotesView(`' . $permintaan->kode_permintaan . '`,1,`' . $permintaan->tanggal_approve_manager_peminta . '`,`' . $permintaan->note_manager_peminta . '`)" class="btn btn-xs text-center btn-warning btn-flat fw-bold"><i class="mdi mdi-pause text-white text-center fw-bold"></i></button>';
                } else {
                    $appr = '<button onclick="tglNotesView(`' . $permintaan->kode_permintaan . '`,1,`' . $permintaan->tanggal_approve_manager_peminta . '`,`' . $permintaan->note_manager_peminta . '`)" class="btn btn-xs text-center btn-secondary btn-flat fw-bold"><i class="mdi mdi-minus text-white text-center fw-bold"></i></button>';
                }

                return $appr;
            })

            ->addColumn('approved_manager_keuangan_unit', function ($permintaan) {
                $appr = '';
                if ($permintaan->approve_manager_keuangan_unit == 1) {
                    $appr = '<button onclick="tglNotesView(`' . $permintaan->kode_permintaan . '`,1,`' . $permintaan->tanggal_approve_manager_keuangan_unit . '`,`' . $permintaan->note_manager_keuangan_unit . '`)" class="btn btn-xs text-center btn-success btn-flat fw-bold"><i class="mdi mdi-check text-white fw-bold"></i></button>';
                } elseif ($permintaan->approve_manager_keuangan_unit == 2) {
                    $appr = '<button onclick="tglNotesView(`' . $permintaan->kode_permintaan . '`,1,`' . $permintaan->tanggal_approve_manager_keuangan_unit . '`,`' . $permintaan->note_manager_keuangan_unit . '`)" class="btn btn-xs text-center btn-danger btn-flat fw-bold"><i class="mdi mdi-close text-white text-center fw-bold"></i></button>';
                } elseif ($permintaan->approve_manager_keuangan_unit == 3) {
                    $appr = '<button onclick="tglNotesView(`' . $permintaan->kode_permintaan . '`,1,`' . $permintaan->tanggal_approve_manager_keuangan_unit . '`,`' . $permintaan->note_manager_keuangan_unit . '`)" class="btn btn-xs text-center btn-warning btn-flat fw-bold"><i class="mdi mdi-pause text-white text-center fw-bold"></i></button>';
                } else {
                    $appr = '<button onclick="tglNotesView(`' . $permintaan->kode_permintaan . '`,1,`' . $permintaan->tanggal_approve_manager_keuangan_unit . '`,`' . $permintaan->note_manager_keuangan_unit . '`)" class="btn btn-xs text-center btn-secondary btn-flat fw-bold"><i class="mdi mdi-minus text-white text-center fw-bold"></i></button>';
                }

                return $appr;
            })

            ->addColumn('approved_direktur_rs', function ($permintaan) {
                $appr = '';
                if ($permintaan->approve_direktur_rs == 1) {
                    $appr = '<button onclick="tglNotesView(`' . $permintaan->kode_permintaan . '`,1,`' . $permintaan->tanggal_approve_direktur_rs . '`,`' . $permintaan->note_direktur_rs . '`)" class="btn btn-xs text-center btn-success btn-flat fw-bold"><i class="mdi mdi-check text-white fw-bold"></i></button>';
                } elseif ($permintaan->approve_direktur_rs == 2) {
                    $appr = '<button onclick="tglNotesView(`' . $permintaan->kode_permintaan . '`,1,`' . $permintaan->tanggal_approve_direktur_rs . '`,`' . $permintaan->note_direktur_rs . '`)" class="btn btn-xs text-center btn-danger btn-flat fw-bold"><i class="mdi mdi-close text-white text-center fw-bold"></i></button>';
                } elseif ($permintaan->approve_direktur_rs == 3) {
                    $appr = '<button onclick="tglNotesView(`' . $permintaan->kode_permintaan . '`,1,`' . $permintaan->tanggal_approve_direktur_rs . '`,`' . $permintaan->note_direktur_rs . '`)" class="btn btn-xs text-center btn-warning btn-flat fw-bold"><i class="mdi mdi-pause text-white text-center fw-bold"></i></button>';
                } else {
                    $appr = '<button onclick="tglNotesView(`' . $permintaan->kode_permintaan . '`,1,`' . $permintaan->tanggal_approve_direktur_rs . '`,`' . $permintaan->note_direktur_rs . '`)" class="btn btn-xs text-center btn-secondary btn-flat fw-bold"><i class="mdi mdi-minus text-white text-center fw-bold"></i></button>';
                }

                return $appr;
            })

            ->addColumn('approved_technical_expert', function ($permintaan) {
                $appr = '';
                if ($permintaan->approve_technical_expert == 1) {
                    $appr = '<button onclick="tglNotesView(`' . $permintaan->kode_permintaan . '`,1,`' . $permintaan->tanggal_approve_technical_expert . '`,`' . $permintaan->note_technical_expert  . '`)" class="btn btn-xs text-center btn-success btn-flat fw-bold"><i class="mdi mdi-check text-white fw-bold"></i></button>';
                } elseif ($permintaan->approve_technical_expert == 2) {
                    $appr = '<button onclick="tglNotesView(`' . $permintaan->kode_permintaan . '`,1,`' . $permintaan->tanggal_approve_technical_expert . '`,`' . $permintaan->note_technical_expert . '`)" class="btn btn-xs text-center btn-danger btn-flat fw-bold"><i class="mdi mdi-close text-white text-center fw-bold"></i></button>';
                } elseif ($permintaan->approve_technical_expert == 3) {
                    $appr = '<button onclick="tglNotesView(`' . $permintaan->kode_permintaan . '`,1,`' . $permintaan->tanggal_approve_technical_expert . '`,`' . $permintaan->note_technical_expert . '`)" class="btn btn-xs text-center btn-warning btn-flat fw-bold"><i class="mdi mdi-pause text-white text-center fw-bold"></i></button>';
                } else {
                    $appr = '<button onclick="tglNotesView(`' . $permintaan->kode_permintaan . '`,1,`' . $permintaan->tanggal_approve_technical_expert . '`,`' . $permintaan->note_technical_expert  . '`)" class="btn btn-xs text-center btn-secondary btn-flat fw-bold"><i class="mdi mdi-minus text-white text-center fw-bold"></i></button>';
                }

                return $appr;
            })

            ->addColumn('approved_gm_ho', function ($permintaan) {
                $appr = '';
                if ($permintaan->approve_gm_ho == 1) {
                    $appr = '<button onclick="tglNotesView(`' . $permintaan->kode_permintaan . '`,1,`' . $permintaan->tanggal_approve_gm_ho . '`,`' . $permintaan->note_gm_ho . '`)" class="btn btn-xs text-center btn-success btn-flat fw-bold"><i class="mdi mdi-check text-white fw-bold"></i></button>';
                } elseif ($permintaan->approve_gm_ho == 2) {
                    $appr = '<button onclick="tglNotesView(`' . $permintaan->kode_permintaan . '`,1,`' . $permintaan->tanggal_approve_gm_ho . '`,`' . $permintaan->note_gm_ho . '`)" class="btn btn-xs text-center btn-danger btn-flat fw-bold"><i class="mdi mdi-close text-white text-center fw-bold"></i></button>';
                } elseif ($permintaan->approve_gm_ho == 3) {
                    $appr = '<button onclick="tglNotesView(`' . $permintaan->kode_permintaan . '`,1,`' . $permintaan->tanggal_approve_gm_ho . '`,`' . $permintaan->note_gm_ho . '`)" class="btn btn-xs text-center btn-warning btn-flat fw-bold"><i class="mdi mdi-pause text-white text-center fw-bold"></i></button>';
                } else {
                    $appr = '<button onclick="tglNotesView(`' . $permintaan->kode_permintaan . '`,1,`' . $permintaan->tanggal_approve_gm_ho . '`,`' . $permintaan->note_gm_ho . '`)" class="btn btn-xs text-center btn-secondary btn-flat fw-bold"><i class="mdi mdi-minus text-white text-center fw-bold"></i></button>';
                }

                return $appr;
            })

            ->addColumn('approved_gm_fat', function ($permintaan) {
                $appr = '';
                if ($permintaan->approve_gm_fat == 1) {
                    $appr = '<button onclick="tglNotesView(`' . $permintaan->kode_permintaan . '`,1,`' . $permintaan->tanggal_approve_gm_fat . '`,`' . $permintaan->note_gm_fat . '`)" class="btn btn-xs text-center btn-success btn-flat fw-bold"><i class="mdi mdi-check text-white fw-bold"></i></button>';
                } elseif ($permintaan->approve_gm_fat == 2) {
                    $appr = '<button onclick="tglNotesView(`' . $permintaan->kode_permintaan . '`,1,`' . $permintaan->tanggal_approve_gm_fat . '`,`' . $permintaan->note_gm_fat . '`)" class="btn btn-xs text-center btn-danger btn-flat fw-bold"><i class="mdi mdi-close text-white text-center fw-bold"></i></button>';
                } elseif ($permintaan->approve_gm_fat == 3) {
                    $appr = '<button onclick="tglNotesView(`' . $permintaan->kode_permintaan . '`,1,`' . $permintaan->tanggal_approve_gm_fat . '`,`' . $permintaan->note_gm_fat . '`)" class="btn btn-xs text-center btn-warning btn-flat fw-bold"><i class="mdi mdi-pause text-white text-center fw-bold"></i></button>';
                } else {
                    $appr = '<button onclick="tglNotesView(`' . $permintaan->kode_permintaan . '`,1,`' . $permintaan->tanggal_approve_gm_fat . '`,`' . $permintaan->note_gm_fat . '`)" class="btn btn-xs text-center btn-secondary btn-flat fw-bold"><i class="mdi mdi-minus text-white text-center fw-bold"></i></button>';
                }

                return $appr;
            })

            ->rawColumns(['approved_manager_peminta', 'approved_manager_keuangan_unit', 'approved_direktur_rs', 'approved_technical_expert', 'approved_gm_ho', 'approved_gm_fat', 'aksi'])
            ->make(true);
    }

    public function approval_data($approve)
    {


        $where = 'where 1=1';

        if ($approve == 'manager_peminta') {
            if (Auth::user()->level == 2) {
                $select = '"' . $approve . '" as xapprove';
                $where = 'where department_id=' . Auth::user()->id_department . ' and branch_id=' . Auth::user()->id_branch;
            } else {
                $select = '"' . $approve . '" as xapprove';
                $where = '';
            }
        }

        if ($approve == 'manager_keuangan_unit') {
            if (Auth::user()->level == 3) {
                $select = '"' . $approve . '" as xapprove';
                $where = 'where branch_id=' . Auth::user()->id_branch;
            } else {
                $select = '"' . $approve . '" as xapprove';
                $where = '';
            }
        }

        if ($approve == 'direktur_rs') {
            if (Auth::user()->level == 4) {
                $select = '"' . $approve . '" as xapprove';
                $where = 'where branch_id=' . Auth::user()->id_branch;
            } else {
                $select = '"' . $approve . '" as xapprove';
                $where = 'where branch_id=' . Auth::user()->id_branch;
            }
        }

        if ($approve == 'technical_expert') {
            if (Auth::user()->level == 5) {
                $select = '"' . $approve . '" as xapprove';
                $where = 'where branch_id=' . Auth::user()->id_branch . ' and total_harga >' . min_tech_expert();
            } else if (Auth::user()->level == 2) {
                $select = '"' . $approve . '" as xapprove';
                $where = 'where branch_id=' . Auth::user()->id_branch . ' and total_harga <=' . min_tech_expert();
            } else {
                $select = '"' . $approve . '" as xapprove';
                $where = '';
            }
            // if (Auth::user()->level == 5) {
            //     $select = '"' . $approve . '" as xapprove';
            //     $where = 'where branch_id=' . Auth::user()->id_branch . ' and total_harga >' . min_tech_expert();
            // } else if (Auth::user()->level == 2) {
            //     $select = '"' . $approve . '" as xapprove';
            //     $where = 'where branch_id=' . Auth::user()->id_branch . ' and total_harga <=' . min_tech_expert();
            // } else {
            //     $select = '"' . $approve . '" as xapprove';
            //     $where = '';
            // }
        }

        if ($approve == 'gm_ho') {
            $select = '"' . $approve . '" as xapprove';
            $where = '';
        }

        if ($approve == 'gm_fat') {
            if (Auth::user()->level == 7) {
                $select = '"' . $approve . '" as xapprove';
                $where = '';
            }
        }

        $permintaan = DB::select('select p.*,' . $select . ' ,(select name from users u where u.id = p.id_status_approve_reject  ) as user_status_approve_reject,(select name from users u where u.id = p.id_user_input  ) as nama_user_input,(select nama from branch b2  where b2.id_branch  = p.branch_id  ) as nama_branch,(select department from department d where d.id_department = p.department_id  ) as nama_department,p.deskripsi  from permintaan p ' . $where . ' order by kode_permintaan desc');

        return datatables()
            ->of($permintaan)
            ->addIndexColumn()
            ->addColumn('status', function ($permintaan) {
                $xapprove = $permintaan->xapprove;
                $nama_approve = 'approve_' . $permintaan->xapprove;
                $tanggal_approve = 'tanggal_' . $nama_approve;
                $note_approve = 'note_' . $permintaan->xapprove;
                $proses = $permintaan->$nama_approve;

                // if ($xapprove == 'manager_peminta') {
                if ($proses == 1) {
                    $proses = '<button onclick="tglNotesView(`' . $permintaan->kode_permintaan . '`,1,`' . $permintaan->$tanggal_approve . '`,`' . $permintaan->$note_approve . '`)" class="btn btn-xs text-center btn-success btn-flat fw-bold"><i class="mdi mdi-check text-white fw-bold"></i></button>';
                } elseif ($proses == 2) {
                    $proses = '<button onclick="tglNotesView(`' . $permintaan->kode_permintaan . '`,1,`' . $permintaan->$tanggal_approve . '`,`' . $permintaan->$note_approve . '`)" class="btn btn-xs text-center btn-danger btn-flat fw-bold"><i class="mdi mdi-close text-white text-center fw-bold"></i></button>';
                } elseif ($proses == 3) {
                    $proses = '<button onclick="tglNotesView(`' . $permintaan->kode_permintaan . '`,1,`' . $permintaan->$tanggal_approve . '`,`' . $permintaan->$note_approve . '`)" class="btn btn-xs text-center btn-warning btn-flat fw-bold"><i class="mdi mdi-pause text-white text-center fw-bold"></i></button>';
                } else {
                    $proses = '<button onclick="tglNotesView(`' . $permintaan->kode_permintaan . '`,1,`' . $permintaan->$tanggal_approve . '`,`' . $permintaan->$note_approve . '`)" class="btn btn-xs text-center btn-secondary btn-flat fw-bold"><i class="mdi mdi-minus text-white text-center fw-bold"></i></button>';
                }


                // }

                // if ($xapprove == 'manager_keuangan_unit') {
                //     $proses = $xapprove;
                //     if ($permintaan->approve_manager_keuangan_unit == 1) {
                //         $proses = '<button onclick="tglNotesView(`' . $permintaan->kode_permintaan . '`,1,`' . $permintaan->tanggal_approve_manager_keuangan_unit . '`,`' . $permintaan->note_manager_keuangan_unit . '`)" class="btn btn-xs text-center btn-success btn-flat fw-bold"><i class="mdi mdi-check text-white fw-bold"></i></button>';
                //     } elseif ($permintaan->approve_manager_keuangan_unit == 2) {
                //         $proses = '<button onclick="tglNotesView(`' . $permintaan->kode_permintaan . '`,1,`' . $permintaan->tanggal_approve_manager_keuangan_unit . '`,`' . $permintaan->note_manager_keuangan_unit . '`)" class="btn btn-xs text-center btn-danger btn-flat fw-bold"><i class="mdi mdi-close text-white text-center fw-bold"></i></button>';
                //     } elseif ($permintaan->approve_manager_keuangan_unit == 3) {
                //         $proses = '<button onclick="tglNotesView(`' . $permintaan->kode_permintaan . '`,1,`' . $permintaan->tanggal_approve_manager_keuangan_unit . '`,`' . $permintaan->note_manager_keuangan_unit . '`)" class="btn btn-xs text-center btn-warning btn-flat fw-bold"><i class="mdi mdi-pause text-white text-center fw-bold"></i></button>';
                //     } else {
                //         $proses = '<button onclick="tglNotesView(`' . $permintaan->kode_permintaan . '`,1,`' . $permintaan->tanggal_approve_manager_keuangan_unit . '`,`' . $permintaan->note_manager_keuangan_unit . '`)" class="btn btn-xs text-center btn-secondary btn-flat fw-bold"><i class="mdi mdi-minus text-white text-center fw-bold"></i></button>';
                //     }
                // }


                return $proses;
            })
            ->addColumn('aksi', function ($permintaan) {
                $xapprove = $permintaan->xapprove;
                $nama_approve = 'approve_' . $permintaan->xapprove;

                if ($permintaan->$nama_approve == 0 or $permintaan->$nama_approve == 3) {
                    $aksi = '<button onClick="approvalDetailData(`' . route('approval.detaildata', $permintaan->id_permintaan) . '`)" class="btn btn-xs btn-info btn-flat text-white">Action</button>';
                } else {
                    $aksi = '';
                }

                return $aksi;
            })

            ->rawColumns(['status', 'aksi'])
            ->make(true);
        // return datatables()->eloquent($permintaan)->toJson();
        // return datatables($permintaan)->toJson();
    }

    public function detaildata($id)
    {
        // $permintaan = PermintaanDetail::where('id_permintaan', $id)->where('id_status_approve_reject', 0)->orWhere('id_status_approve_reject', 1)->orWhere('id_status_approve_reject', 3)->get();

        // 0/1= approve, 2=reject, 3=hold
        $permintaan = PermintaanDetail::where('id_permintaan', $id)->where(function ($query) {
            $query->where('id_status_approve_reject', 0)
                ->orWhere('id_status_approve_reject', 1)
                ->orWhere('id_status_approve_reject', 3);
        })->get();

        // return $permintaan;
        $response['data'] = $permintaan;
        return response()->json($response);
    }

    public function approved_data_save(Request $request)
    {

        foreach ($request->jumlah as $jm) {
            if ($jm == 0) {
                return response()->json(['message' => 'jumlah tidak boleh 0', 'code' => '404']);
            }
        }

        if ($request->title == 'Manager Peminta') {
            $approved = 'approve_manager_peminta';
            $tanggal_approved = 'tanggal_approve_manager_peminta';
            $note_approved = 'note_manager_peminta';
        }

        if ($request->title == 'Manager Keuangan Unit') {
            $approved = 'approve_manager_keuangan_unit';
            $tanggal_approved = 'tanggal_approve_manager_keuangan_unit';
            $note_approved = 'note_manager_keuangan_unit';
        }

        if ($request->title == 'Direktur Rumah Sakit') {
            $approved = 'approve_direktur_rs';
            $tanggal_approved = 'tanggal_approve_direktur_rs';
            $note_approved = 'note_direktur_rs';
        }

        if ($request->title == 'Technical Expert') {
            $approved = 'approve_technical_expert';
            $tanggal_approved = 'tanggal_approve_technical_expert';
            $note_approved = 'note_technical_expert';
        }

        if ($request->title == 'GM HO') {
            $approved = 'approve_gm_ho';
            $tanggal_approved = 'tanggal_approve_gm_ho';
            $note_approved = 'note_gm_ho';
        }

        if ($request->title == 'GM FAT') {
            $approved = 'approve_gm_fat';
            $tanggal_approved = 'tanggal_approve_gm_fat';
            $note_approved = 'note_gm_fat';
        }

        $approvedInsert = Permintaan::where('kode_permintaan', $request->kode_permintaan)->update([$approved => $request->action, $tanggal_approved => now(), $note_approved => $request->notes]);

        if ($approvedInsert) {
            $jm = $request->jumlah;

            foreach ($jm as $row => $key) {
                PermintaanDetail::where('kode_permintaan', $request->kode_permintaan[$row])->where('kode_barang', $request->kode_barang[$row])->update(['jumlah' => $request->jumlah[$row]]);
            }
        }

        return response()->json(['message' => 'approve berhasil', 'code' => '200']);
    }

    public function detaildataupdate(Request $request)
    {
        if ($request->id_permintaan_item) {
            PermintaanDetail::where('id_permintaan_detail', $request->id_permintaan_item)->update(['id_status_approve_reject' => $request->action, 'id_user_approve_reject' => $request->id_user_approve_reject, 'tanggal_approve_reject' => now()]);
        }
        return $request->all();
    }
}
