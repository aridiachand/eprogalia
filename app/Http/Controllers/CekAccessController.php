<?php

namespace App\Http\Controllers;

use App\Models\Permintaan;
use Illuminate\Http\Request;

class CekAccessController extends Controller
{
    public function barangonproses($idpermintaan)
    {
        // cek status manager peminta

        if ($idpermintaan) {
            $result = Permintaan::where('id_permintaan', $idpermintaan)->where('approve_manager_peminta', '<>', 0)->where('approve_manager_peminta', '<>', 2)->count();

            return $result;
        } else {
            return response()->json(['message' => 'nomer permintaan kosong']);
        }
    }
}
