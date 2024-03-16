<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Exception;
use App\Helpers\APIFormatter;
use App\Models\Kamar;

class KamarController extends Controller
{
    public function kamar() {
        try {
            $kamar = Kamar::where('status_kamar', 'Tersedia')->get();

            if($kamar) {
                return APIFormatter::createAPI(200, "Success", $kamar);
            } else {
                return APIFormatter::createAPI(400, 'Failed');
            }
        } catch (Exception $e) {
            return APIFormatter::createAPI(500, 'Failed', $e);
        }
    }

    public function show(Request $request) {
        try {
            $kamar = Kamar::where('id', $request->id)->first();

            if($kamar) {
                return APIFormatter::createAPI(200, "Success", $kamar);
            } else {
                return APIFormatter::createAPI(400, 'Failed');
            }
        } catch (Exception $e) {
            return APIFormatter::createAPI(500, 'Failed', $e);
        }
    }

    public function filter(Request $request) {
        try {
            $kamar = Kamar::where('kelas_kamar', 'like', $request->kelas_kamar)->get();

            if($kamar) {
                return APIFormatter::createAPI(200, "Success", $kamar);
            } else {
                return APIFormatter::createAPI(400, 'Failed');
            }
        } catch (Exception $e) {
            return APIFormatter::createAPI(500, 'Failed', $e);
        }
    }
}