<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kamar;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $kamar_tersedia = Kamar::where('status_kamar', 'Tersedia')->count();
        $costumer = User::where('role_id', '2')->count();
        return view('dashboard', [
            'kamar_tersedia' => $kamar_tersedia,
            'costumer' => $costumer
        ]);
    }
}
