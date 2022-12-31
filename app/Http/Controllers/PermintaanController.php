<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Branch;
use App\Models\Department;
use App\Models\KategoriTipe;
use App\Models\Permintaan;
use App\Models\PermintaanDetail;
use App\Models\User;
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
        $permintaan = DB::select('select *,(select name from users u where u.id = p.id_user_input  ) as nama_user_input,(select nama from branch b2  where b2.id_branch  = p.branch_id  ) as nama_branch,(select department from department d where d.id_department = p.department_id  ) as nama_department,(select status_approve from status_approve sa where sa.id_status_approve = p.id_status_approve_reject) as status_approve  from permintaan p order by kode_permintaan desc');


        // if ($permintaan['id_status_approve_reject'] == 1) {
        //     $status = 'Approve';
        // }
        // if ($permintaan['id_status_approve_reject'] == 2) {
        //     $status = 'Reject';
        // }


        return datatables()
            ->of($permintaan)
            ->addIndexColumn()
            ->addColumn('status', function ($permintaan) {
                return '<span>Prosses<span>';
            })
            ->addColumn('aksi', function ($permintaan) {
                return '<button onClick="editForm(`' . route('permintaan.update', $permintaan->id_permintaan) . '`)" class="btn btn-xs btn-info btn-flat"><i class="mdi mdi-lead-pencil"></i></button><button onClick="deleteData(`' . route('permintaan.destroy', $permintaan->id_permintaan) . '`)" class="btn btn-xs btn-danger btn-flat"><i class="mdi mdi-delete"></i></button></button><button onClick="detailData(`' . route('permintaan.detaildata', $permintaan->id_permintaan) . '`)" class="btn btn-xs btn-success btn-flat"><i class="mdi mdi-eye"></i></button>';
            })
            ->rawColumns(['status', 'aksi'])
            ->make(true);
        // return datatables()->eloquent($permintaan)->toJson();
        // return datatables($permintaan)->toJson();
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
        $kategoriTipe = KategoriTipe::all()->pluck('id_kategori_tipe', 'kode_kategori_tipe');
        $barang = Barang::all();
        $branch = Branch::all()->pluck('id_branch', 'nama');
        $idBranch = Branch::find(Auth::user()->id_branch);
        $idDepartment = Department::find(Auth::user()->id_department);

        // if($idDepartment){

        // }

        return view('permintaan.form-permintaan-barang', compact('department', 'kategoriTipe', 'barang', 'branch', 'idBranch', 'idDepartment'));
    }

    public function store_all(Request $request)
    {
        $p = Permintaan::latest()->first();
        if (!$p) {
            $permintaan = 1;
        } else {
            $permintaan = $p->id_permintaan;
        }
        $request['kode_permintaan'] = 'BPB' . generate_kode_permintaan($permintaan);

        $permintaan = new Permintaan();
        $permintaan->kode_permintaan = $request->kode_permintaan;
        $permintaan->department_id = $request->id_department;
        $permintaan->branch_id = $request->id_branch;
        $permintaan->deskripsi = $request->deskripsi;
        $permintaan->tanggal_permintaan = now();
        $permintaan->tanggal_dibutuhkan = now();
        $permintaan->id_user_input = Auth::id();
        $permintaan->save();

        // dd($request->all());
        if ($permintaan) {
            $kb = $request->kode_barang;
            foreach ($kb as $row => $key) {
                $permintaan_detail = new PermintaanDetail();
                $permintaan_detail->id_permintaan = $permintaan['id_permintaan'];
                $permintaan_detail->kode_permintaan = $request->kode_permintaan;
                $permintaan_detail->kode_barang = $request->kode_barang[$row];
                $permintaan_detail->nama_barang = $request->nama_barang[$row];
                $permintaan_detail->id_satuan_barang = 0;
                $permintaan_detail->tipe_input = 0;
                $permintaan_detail->harga_beli = 0;
                $permintaan_detail->jumlah = 0;
                $permintaan_detail->subtotal = 0;
                $permintaan_detail->id_user_input = Auth::id();
                $permintaan_detail->save();
            }
        }


        return redirect(route('permintaan.index'));
    }

    public function detaildata($id)
    {

        $permintaan = PermintaanDetail::where('id_permintaan', $id)->get();

        return datatables()
            ->of($permintaan)
            ->addIndexColumn()
            ->addColumn('status', function ($permintaan) {
                return '<span>Prosses<span>';
            })
            ->addColumn('checklist', function ($permintaan) {
                return '<label class="customcheckbox">
                <input type="checkbox" class="listCheckbox" />
                <span class="checkmark"></span>
            </label>';
            })
            ->addColumn('aksi', function ($permintaan) {
                return '<button onClick="editForm(`' . route('permintaan-detail.update', $permintaan->id_permintaan) . '`)" class="btn btn-xs btn-info btn-flat"><i class="mdi mdi-lead-pencil"></i></button><button onClick="deleteData(`' . route('permintaan-detail.destroy', $permintaan->id_permintaan) . '`)" class="btn btn-xs btn-danger btn-flat"><i class="mdi mdi-delete"></i></button></button>';
            })
            ->rawColumns(['status', 'aksi', 'checklist'])
            ->make(true);
    }
}
