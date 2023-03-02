<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Branch;
use App\Models\Department;
use App\Models\GenerateSPB;
use App\Models\KategoriBarang;
use App\Models\Permintaan;
use App\Models\PermintaanDetail;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PermintaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('permintaan.index');
    }

    public function data()
    {
        // if (Auth::user()->level > 0) {
        //     if (Auth::user()->id_jabatan == 1) {
        //         $where_id_user_input = 'where department_id=' . Auth::user()->id_department;
        //     } else {
        //         $where_id_user_input = 'where 1=1';
        //     }
        // } else {
        //     $where_id_user_input = 'where 1=1';
        // }

        $where_id_user_input = 'where 1=1';

        $permintaan = DB::select('select *,DATE_FORMAT(tanggal_permintaan,"%d-%m-%Y") as t_permintaan,(select name from users u where u.id = p.id_user_input  ) as nama_user_input,(select nama from branch b2  where b2.id_branch  = p.branch_id  ) as nama_branch,(select department from department d where d.id_department = p.department_id  ) as nama_department,(select status_approve from status_approve sa where sa.id_status_approve = p.id_status_approve_reject) as status_approve  from permintaan p ' . $where_id_user_input . '  order by tanggal_permintaan desc');

        return datatables()
            ->of($permintaan)
            ->addIndexColumn()
            ->addColumn('aksi', function ($permintaan) {
                $delete = '<button onClick="deleteData(`' . route('permintaan.destroy', $permintaan->id_permintaan) . '`)" class="btn btn-xs btn-danger btn-flat"><i class="mdi mdi-delete"></i></button>';
                $view = '<button onClick="window.location =(`' . route('permintaan.detaildata', encrypt($permintaan->id_permintaan)) . '`)" class="btn btn-xs btn-success btn-flat"><i class="mdi mdi-eye"></i></button>';

                return  $view;
                // return '<button onClick="editForm(`' . route('permintaan.update', $permintaan->id_permintaan) . '`)" class="btn btn-xs btn-info btn-flat"><i class="mdi mdi-lead-pencil"></i></button><button onClick="deleteData(`' . route('permintaan.destroy', $permintaan->id_permintaan) . '`)" class="btn btn-xs btn-danger btn-flat"><i class="mdi mdi-delete"></i></button></button><button onClick="detailData(`' . route('permintaan.detaildata', $permintaan->id_permintaan) . '`)" class="btn btn-xs btn-success btn-flat"><i class="mdi mdi-eye"></i></button>';
            })
            ->addColumn('status', function ($permintaan) {
                if ($permintaan->approve_manager_peminta == 1) {
                    $mp = 'btn-success text-white fw-bold mx-1';
                } elseif ($permintaan->approve_manager_peminta == 2) {
                    $mp = 'btn-reject text-white fw-bold mx-1';
                } elseif ($permintaan->approve_manager_peminta == 3) {
                    $mp = 'btn-warning text-white fw-bold mx-1';
                } else {
                    $mp = 'btn-secondary';
                }

                if ($permintaan->approve_manager_keuangan_unit == 1) {
                    $mku = 'btn-success text-white fw-bold mx-1';
                } elseif ($permintaan->approve_manager_keuangan_unit == 2) {
                    $mku = 'btn-reject text-white fw-bold mx-1';
                } elseif ($permintaan->approve_manager_keuangan_unit == 3) {
                    $mku = 'btn-warning text-white fw-bold mx-1';
                } else {
                    $mku = 'btn-secondary';
                }

                if ($permintaan->approve_direktur_rs == 1) {
                    $drs = 'btn-success text-white fw-bold mx-1';
                } elseif ($permintaan->approve_direktur_rs == 2) {
                    $drs = 'btn-reject text-white fw-bold mx-1';
                } elseif ($permintaan->approve_direktur_rs == 3) {
                    $drs = 'btn-warning text-white fw-bold mx-1';
                } else {
                    $drs = 'btn-secondary';
                }

                if ($permintaan->approve_direktur_rs == 1) {
                    $drs = 'btn-success text-white fw-bold mx-1';
                } elseif ($permintaan->approve_direktur_rs == 2) {
                    $drs = 'btn-reject text-white fw-bold mx-1';
                } elseif ($permintaan->approve_direktur_rs == 3) {
                    $drs = 'btn-warning text-white fw-bold mx-1';
                } else {
                    $drs = 'btn-secondary';
                }

                // if ($permintaan->approve_manager_keuangan_unit == 1) {
                //     $mku = 'btn-success';
                // } else {
                //     $mku = 'btn-secondary';
                // }

                // if ($permintaan->approve_direktur_rs == 1) {
                //     $bgstatus = 'btn-success';
                // }

                // if ($permintaan->approve_procurement == 1) {
                //     $bgstatus = 'btn-success';
                // }

                // if ($permintaan->approve_manager_procurement == 1) {
                //     $bgstatus = 'btn-success';
                // }
                $status = '<button class="btn btn-xs ' . $mp . ' btn-flat" title="Manager Peminta">MP</button><button class="btn btn-xs ' . $mku . '   btn-flat" title="Manager Keuangan Unit">MKU</button><button class="btn btn-xs ' . $drs . ' btn-flat" title="Direktur RS">Dir RS</button>';

                if (strtoupper($permintaan->nama_prioritas_permintaan) == 'NON CITO' && strtoupper($permintaan->nama_tipe_permintaan) == 'NON RUTIN' && $permintaan->total_harga < 5000000) {
                    $status = '<button class="btn btn-xs ' . $mp . '  btn-flat" title="Manager Peminta">MP</button><button class="btn btn-xs ' . $mku . '  btn-flat" title="Manager Keuangan Unit">MKU</button><button class="btn btn-xs ' . $drs . ' btn-flat" title="Direktur RS">Dir RS</button>';
                }

                return $status;
            })
            ->rawColumns(['status', 'aksi'])
            ->make(true);
    }


    public function create()
    {
        //
    }

    public function editdetaildata(Request $request)
    {
        if ($request->all()) {
            $id_permintaan_detail = $request->id_permintaan_detail;
            $jumlah = intval($request->jumlah);
            $total = $request->total;

            $permintaanDetail = PermintaanDetail::find($id_permintaan_detail);
            $permintaanDetail->jumlah = $jumlah;
            $permintaanDetail->subtotal = $total;
            $permintaanDetail->update();

            // return $permintaanDetail;

            if ($permintaanDetail) {
                return response()->json(['status' => 'success', 'message' => 'data berhasil di update!']);
            } else {
                return response()->json(['status' => 'failed', 'message' => 'data gagal di update!']);
            }
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id_kategori = intval($request->id_kategori);
        $id_kategori_detail = intval($request->id_kategori_detail);

        $kode_permintaan = Str::random(8);

        $permintaan = new Permintaan();
        $permintaan->id_kategori = $id_kategori;
        $permintaan->id_kategori_detail = $id_kategori_detail;
        $permintaan->kode_permintaan = $kode_permintaan;
        $permintaan->nama_permintaan = $request->nama_permintaan;
        $permintaan->merk_permintaan = $request->merk_permintaan;
        $permintaan->rutin = $request->rutin;
        $permintaan->id_user_input = Auth::id();
        $permintaan->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $permintaan = Permintaan::find($id);
        return response()->json($permintaan);
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
        $permintaan = Permintaan::find($id);
        $permintaan->nama_permintaan = $request->nama_permintaan;
        $permintaan->update();

        return response()->json('Berhasil di update', 200);
    }


    public function destroy($id)
    {
        $permintaan = Permintaan::find($id);
        $permintaan->delete();

        return response(null, 204);
    }


    // more method ======================================

    public function form_permintaan_barang(Request $request)
    {
        $department = Department::all()->pluck('id_department', 'department');
        $kategoriBarang = KategoriBarang::all()->pluck('id_kategori_barang', 'kode_kategori_barang');
        // $barang = DB::select('select *,(select kode_satuan_barang from satuan_barang sb where b.id_satuan_kecil = id_satuan_barang) as nama_satuan,(select kode_kategori_barang from kategori_barang kt where b.id_kategori_barang =id_kategori_barang) as kodekategoriBarang
        // from barang b');
        $barang = DB::select("select   *,'nama_satuan' as nama_satuan from barang limit 1");

        $branch = Branch::all()->pluck('id_branch', 'nama');

        $idBranch = Branch::find(Auth::user()->id_branch);
        $idDepartment = Department::find(Auth::user()->id_department);

        // generate spb ===================
        $tanggal = Carbon::now()->isoFormat('DDMMYY');
        $namabranch =  Branch::where('id_branch', Auth::user()->id_branch)->pluck('branch');
        $p = DB::table('generate_spb')->where('id_branch', '=', Auth::user()->id_branch)->latest('created_at')->first();
        ($p) ? $substr = substr($p->kode_permintaan, strrpos($p->kode_permintaan, '-') + 1) : $substr = 0;
        $no = intval($substr) + 1;
        $noSPB = generate_kode_permintaan_new($no, $namabranch[0], $tanggal);

        $insertSPB = GenerateSPB::create([
            'kode_permintaan' => $noSPB,
            'id_branch' => Auth::user()->id_branch,
            'id_department' => Auth::user()->id_department,
            'tanggal' =>  $tanggal,
        ]);

        return view('permintaan.form-permintaan-barang', compact('department', 'kategoriBarang', 'barang', 'branch', 'idBranch', 'idDepartment', 'noSPB'));
    }

    public function store_all(Request $request)
    {
        // nama_branch,nama_unit
        ($request->tipe_permintaan == 'nonrutin') ? $request['tipe_permintaan'] = 'Non Rutin' : $request['tipe_permintaan'] = 'Rutin';
        ($request->prioritas_permintaan == 'noncito') ? $request['prioritas_permintaan'] = 'Non CITO' : $request['prioritas_permintaan'] = 'CITO';

        $tanggal_permintaan = Carbon::createFromFormat('d/m/Y', $request->tanggal_permintaan)->format('Y-m-d');

        $request['id_department'] = intval($request->id_department);
        $request['managmenet'] = intval($request->managmenet);
        $totalItem = count($request->nama_barang);
        $total_harga = array_sum($request->total);

        // ======================generate spb pindah ke form_permintaan_barang diatas method ini===========================
        // $tanggal = Carbon::now()->isoFormat('DDMMYY');
        // $branch =  Branch::where('id_branch', Auth::user()->id_branch)->pluck('branch');
        // $p = DB::table('permintaan')->where('branch_id', '=', Auth::user()->id_branch)->latest('created_at')->first();
        // $substr = substr($p->kode_permintaan, strrpos($p->kode_permintaan, '-') + 1);
        // $no = intval($substr) + 1;
        // $request['kode_permintaan'] = generate_kode_permintaan_new($no, $branch[0], $tanggal);

        $permintaan = new Permintaan();
        $permintaan->kode_permintaan = $request->kode_permintaan;
        $permintaan->nama_tipe_permintaan = $request->tipe_permintaan;
        $permintaan->nama_prioritas_permintaan = $request->prioritas_permintaan;
        $permintaan->nama_kategori_barang = $request->kategori_barang;
        $permintaan->nama_permintaan = $request->nama_permintaan;
        $permintaan->branch_id = $request->id_branch;
        $permintaan->department_id = $request->id_department;
        $permintaan->deskripsi = ($request->keterangan_spb == null) ? '' : $request->keterangan_spb;
        $permintaan->total_item = $totalItem;
        $permintaan->total_harga = $total_harga;
        $permintaan->tanggal_permintaan = $tanggal_permintaan;
        $permintaan->tanggal_dibutuhkan = now();
        $permintaan->id_user_input = auth()->id();
        $permintaan->save();

        // return $request->all();

        // return $permintaan;

        if ($permintaan) {
            $kb = $request->kode_barang;
            foreach ($kb as $row => $key) {
                // $kode_barang = $request->kode_barang[$row];
                $permintaan_detail = new PermintaanDetail();
                $permintaan_detail->id_permintaan = $permintaan['id_permintaan'];
                $permintaan_detail->kode_permintaan = $request->kode_permintaan;
                $permintaan_detail->kode_barang = $request->kode_barang[$row];
                $permintaan_detail->nama_barang = $request->nama_barang[$row];
                $permintaan_detail->tipe_input = 0;
                $permintaan_detail->harga_beli = $request->harga_barang[$row];
                $permintaan_detail->jumlah = $request->jumlah[$row];
                $permintaan_detail->id_satuan_barang = $request->id_satuan_item[$row];
                $permintaan_detail->subtotal = $request->total[$row];
                $permintaan_detail->deskripsi = $request->keterangan_item[$row];
                $permintaan_detail->id_user_input = Auth::id();
                $permintaan_detail->save();
            }

            // return $permintaan_detail;
        }

        return response()->json('input permintaan berhasil', 200);
        // return redirect(route('permintaan.index'));
    }

    public function detaildata($id)
    {
        $where = 'where id_permintaan =' . decrypt($id);

        $pr = DB::select('select p.nama_tipe_permintaan,p.nama_prioritas_permintaan,p.nama_permintaan,p.nama_kategori_barang, p.approve_manager_peminta,p.kode_permintaan,p.created_at,DATE_FORMAT(p.created_at, "%d-%m-%Y") as created_at_format, p.id_permintaan,p.id_status_approve_reject ,(select name from users u where u.id = p.id_status_approve_reject  ) as user_status_approve_reject,(select name from users u where u.id = p.id_user_input  ) as nama_user_input,(select nama from branch b2  where b2.id_branch  = p.branch_id  ) as nama_branch,(select department from department d where d.id_department = p.department_id  ) as nama_department,p.deskripsi,(select name from users where id= p.id_user_input) as nama_user_inputs,p.tanggal_permintaan from permintaan p ' . $where . ' order by kode_permintaan desc');

        $permintaan = $pr[0];
        // $permintaandetail = PermintaanDetail::where('id_permintaan', decrypt($id))->get();
        $permintaandetail = DB::select('select *,(select kode_satuan_barang from satuan_barang sb where id_satuan_barang = pd.id_satuan_barang) as nama_satuan_barang from permintaan_detail pd ' . $where . ' order by kode_barang');

        return view('permintaan.form-permintaan-barang-detail', compact('permintaan', 'permintaandetail'));

        // return datatables()
        //     ->of($permintaan)
        //     ->addIndexColumn()
        //     ->addColumn('status', function ($permintaan) {
        //         return '<span>Prosses<span>';
        //     })
        //     ->addColumn('checklist', function ($permintaan) {
        //         return '<label class="customcheckbox">
        //         <input type="checkbox" class="listCheckbox" />
        //         <span class="checkmark"></span>
        //     </label>';
        //     })
        //     ->addColumn('aksi', function ($permintaan) {
        //         return '<button onClick="editForm(`' . route('permintaan-detail.update', $permintaan->id_permintaan) . '`)" class="btn btn-xs btn-info btn-flat"><i class="mdi mdi-lead-pencil"></i></button><button onClick="deleteData(`' . route('permintaan-detail.destroy', $permintaan->id_permintaan) . '`)" class="btn btn-xs btn-danger btn-flat"><i class="mdi mdi-delete"></i></button>';
        //     })
        //     ->rawColumns(['status', 'aksi', 'checklist'])
        //     ->make(true);
    }

    public function coba()
    {
        $tanggal = Carbon::now()->isoFormat('DDMMYY');
        $branch =  Branch::where('id_branch', Auth::user()->id_branch)->pluck('branch');
        // $p = DB::table('permintaan')->where('branch_id', '=', Auth::user()->id_branch)->latest('created_at')->first();
        $p = DB::table('permintaan')->where('branch_id', '=', Auth::user()->id_branch)->latest('created_at')->first();
        $substr = substr($p->kode_permintaan, strrpos($p->kode_permintaan, '-') + 1);
        $no = intval($substr) + 1;

        $spb = generate_kode_permintaan_new($no, $branch[0], $tanggal);

        return $spb;
        // return Permintaan::where('branch_id', '=', Auth::user()->id_branch)->last();

        // return DB::table('permintaan')->where('branch_id', '=', Auth::user()->id_branch)->latest('created_at')->first();
    }
}

// <span title="Upload" class="btn btn-xs btn-secondary btn-flat topdf"><i class="mdi mdi-folder-upload"></i></span>
