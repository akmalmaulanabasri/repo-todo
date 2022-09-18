<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardContoller extends Controller
{
    public function landing()
    {
        return view('landing.index');
    }

    public function index()
    {
        date_default_timezone_set('Asia/Jakarta');
        $hari = date('l');
        $trslt = [
            'Monday' => 'Senin',
            'Tuesday' => 'Selasa',
            'Wednesday' => 'Rabu',
            'Thursday' => 'Kamis',
            'Friday' => 'Jumat',
            'Saturday' => 'Sabtu',
            'Sunday' => 'Minggu',
        ];
        $hari_indo = $trslt[$hari];
        $besok = $trslt[date('l', strtotime('+1 day'))];
        $mapel = User::findOrFail(Auth::user()->id)->mapel->where('hari', $hari_indo,);
        $mapel_besok = User::findOrFail(Auth::user()->id)->mapel->where('hari', $besok,);
        $to_do = User::findOrFail(Auth::user()->id)->todo->where('status', 'Pending');
        $tugas = User::findOrFail(Auth::user()->id)->tugas->where('status', 'Pending');
        return view('dashboard.index', ['mapel' => $mapel,'todo' => $to_do ,'hari' => $hari_indo, 'tugas' => $tugas, 'besok' => $besok, 'mapel_besok' => $mapel_besok]);
    }

}
