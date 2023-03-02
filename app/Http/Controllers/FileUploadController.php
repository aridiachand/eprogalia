<?php

namespace App\Http\Controllers;

use App\Models\File_upload;
use App\Models\Permintaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class FileUploadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('file-upload.index');
    }

    // get data upload pbj
    public function data($idpermintaan)
    {

        if ($idpermintaan) {
            $permintaan = Permintaan::where('id_permintaan', $idpermintaan)->pluck('kode_permintaan');
            if ($permintaan) {
                $file = File_upload::where('kode_permintaan', $permintaan[0])->where('id_permintaan_detail', 0)->get();
                if (count($file) > 0) {
                    return response()->json(['success' => 1, $file]);
                } else {
                    return response()->json(['success' => 3]);
                }
            }
        }
    }

    public function dataitem($idpermintaan, $idpermintaandetail)
    {
        if ($idpermintaan) {
            $permintaan = Permintaan::where('id_permintaan', $idpermintaan)->pluck('kode_permintaan');
            if ($permintaan) {
                $file = File_upload::where('kode_permintaan', $permintaan[0])->where('id_permintaan_detail', $idpermintaandetail)->get();
                return $file;
            }
        }
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
        $request->validate([
            // 'file' => 'required|mimes:doc,docx,pdf,zip,rar|max:2048',
            'file' => 'required|mimes:pdf|max:2048',
        ]);

        $fileName = time() . '.' . $request->file->extension();

        $request->file->move(public_path('file'), $fileName);

        File_upload::create(['name' => $fileName]);

        return response()->json('File uploaded successfully');
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


    public function uploadFile(Request $request)
    {
        // return $request->all();
        $data = array();
        $validator = Validator::make($request->all(), [
            'file' => 'required|mimes:pdf|max:2048',
            // 'nama_file' => 'required',
            'nopermintaan' => 'required',
            // 'file' => 'required|mimes:png,jpg,jpeg,csv,txt,pdf|max:2048'
        ]);

        if ($validator->fails()) {

            $data['success'] = 0;
            $data['error'] = $validator->errors()->first('file'); // Error response
            // $data['error'] = $validator->errors()->first('nama_file'); // Error response
            $data['error'] = $validator->errors()->first('nopermintaan'); // Error response
            // $data['error'] = $validator->errors()->first('idpermintaandetail'); // Error response

        } else {
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

                // Response
                $data['success'] = 1;
                $data['message'] = 'Uploaded Successfully!';
                $data['filepath'] = $filepath;
                $data['extension'] = $extension;
                $data['filename'] = $file->getClientOriginalName();
                $data['nopermintaan'] = $request->nopermintaan;
                // $data['idpermintaandetail'] = $request->idpermintaandetail;

                File_upload::create([
                    'nama_file' => $file->getClientOriginalName(),
                    'file_path' => $filepath,
                    'kode_permintaan' => $request->nopermintaan,
                    // 'id_permintaan_detail' => $request->idpermintaandetail,
                    'id_user_upload' => Auth::user()->id,
                ]);
            } else {
                // Response
                $data['success'] = 2;
                $data['message'] = 'File not uploaded.';
            }
        }

        return response()->json($data);
    }


    public function uploadFileItem(Request $request)
    {
        // return $request->all();
        $data = array();
        $validator = Validator::make($request->all(), [
            'file' => 'required|mimes:pdf|max:2048',
            // 'nama_file' => 'required',
            // 'file' => 'required|mimes:png,jpg,jpeg,csv,txt,pdf|max:2048'
        ]);

        if ($validator->fails()) {

            $data['success'] = 0;
            $data['error'] = $validator->errors()->first('file'); // Error response
            // $data['error'] = $validator->errors()->first('nama_file'); // Error response
            // $data['error'] = $validator->errors()->first('nopermintaan'); // Error response

        } else {
            if ($request->file('file')) {
                $idpermintaandetail = $request->idpermintaandetail;

                $file = $request->file('file');
                // $filename = time() . '_' . $file->getClientOriginalName();
                $filename = $file->getClientOriginalName();

                // File extension
                $extension = $file->getClientOriginalExtension();

                // File upload location
                $location = 'files';

                // Upload file
                $file->move($location, $filename);

                // File path
                $filepath = url('files/' . $filename);

                // Response
                $data['success'] = 1;
                $data['message'] = 'Uploaded Successfully!';
                $data['filepath'] = $filepath;
                $data['extension'] = $extension;
                $data['filename'] = $filename;
                $data['nopermintaan'] = $request->nopermintaan;

                File_upload::create([
                    'nama_file' => $filename,
                    'file_path' => $filepath,
                    'id_permintaan_detail' => $idpermintaandetail,
                    'kode_permintaan' => $request->nopermintaan,
                    'id_user_upload' => Auth::user()->id,
                ]);
            } else {
                // Response
                $data['success'] = 2;
                $data['message'] = 'File not uploaded.';
            }
        }

        return response()->json($data);
    }
}
