<?php

namespace App\Http\Controllers;

use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('vendor.index');
    }


    public function data()
    {
        // $vendor = DB::table('vendor');
        $vendor = Vendor::all();

        return datatables()
            ->of($vendor)
            ->addIndexColumn()
            ->addColumn('aksi', function ($vendor) {
                return '<button onClick="editForm(`' . route('vendor.update', $vendor->id_vendor) . '`)" class="btn btn-xs btn-info btn-flat"><i class="mdi mdi-lead-pencil"></i></button><button onClick="deleteData(`' . route('vendor.destroy', $vendor->id_vendor) . '`)" class="btn btn-xs btn-danger btn-flat"><i class="mdi mdi-delete"></i></button>';
            })
            ->rawColumns(['aksi'])
            ->make(true);
        // return datatables()->eloquent($vendor)->toJson();
        // return datatables($vendor)->toJson();
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
        $vendor = new Vendor();
        $vendor->nama_vendor = $request->nama_vendor;
        $vendor->alamat_vendor = $request->alamat_vendor;
        $vendor->telepon = $request->telepon;
        $vendor->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $vendor = Vendor::find($id);

        return response()->json($vendor);
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
        $vendor = Vendor::find($id);
        $vendor->nama_vendor = $request->nama_vendor;
        $vendor->alamat_vendor = $request->alamat_vendor;
        $vendor->telepon = $request->telepon;
        $vendor->update();

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
        $vendor = Vendor::find($id);
        $vendor->delete();

        return response(null, 204);
    }
}
