<?php

namespace App\Http\Controllers;

use App\Models\Mapel;
use App\Models\Tugas;
use App\Models\ToDo;
use Illuminate\Http\Request;

class DashboardContoller extends Controller
{
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
        $mapel = Mapel::where('hari', $hari_indo)->get();
        $to_do = ToDo::where('status', 'Pending')->limit(5)->get();
        $tugas = Tugas::where('status', 'Pending')->limit(5)->get();
        return view('dashboard.index', ['mapel' => $mapel,'todo' => $to_do ,'hari' => $hari_indo, 'tugas' => $tugas]);
    }

}
