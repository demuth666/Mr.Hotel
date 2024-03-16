<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Transaksi;
use App\Models\Kamar;
use Illuminate\Http\Request;
use Exception;
use App\Helpers\APIFormatter;
use Illuminate\Support\Facades\Auth;

class TransaksiController extends Controller
{
    public function transaksi(Request $request) {
        try {
            $transaksi = Transaksi::where('user_id', Auth::id())->with('kamar')->get();

            if($transaksi) {
                return APIFormatter::createAPI(200, "Success", $transaksi);
            } else {
                return APIFormatter::createAPI(400, 'Failed');
            }
        } catch (Exception $e) {
            return APIFormatter::createAPI(500, 'Failed', $e);
        }
    }
    
    public function create(Request $request) {
        try {
            $request->validate([
                'total_bayar' => 'required',
                'check_in' => 'required',
                'check_out' => 'required',
                'kamar_id' => 'required',
            ]);
            
            $transaksi = Transaksi::create([
                'tanggal' => date("Y-m-d H:i:s"),
                'total_bayar' => $request->total_bayar,
                'check_in' => $request->check_in,
                'check_out' => $request->check_out,
                'user_id' => Auth::id(),
                'kamar_id' => $request->kamar_id,
            ]);

            $kamar = Kamar::find($request->kamar_id);
            $kamar->update([
                'status_kamar' => 'Tidak Tersedia',
            ]);

            if($transaksi) {
                return APIFormatter::createAPI(200, "Success", $transaksi);
            } else {
                return APIFormatter::createAPI(400, 'Failed');
            }
        } catch (Exception $e) {
            return APIFormatter::createAPI(500, 'Failed', $e);
        }
    }
}