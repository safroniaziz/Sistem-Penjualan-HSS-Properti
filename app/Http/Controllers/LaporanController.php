<?php

namespace App\Http\Controllers;

use App\Transaksi;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index(){
        return view('admin/laporan.index');
    }

    public function cariLaporan(){
        $bulan = date('m');
        if (isset($_GET['submit'])) {
            if ($_GET['laporan'] == "bulan_ini") {
                $datas = Transaksi::join('properti_details','properti_details.id','transaksis.properti_detail_id')
                                    ->join('propertis','propertis.id','properti_details.properti_id')
                                    ->whereMonth('transaksis.created_at','=',$bulan)->get();
                return view('admin/laporan.index',compact('datas'));
            }
            else{
                $datas = Transaksi::join('properti_details','properti_details.id','transaksis.properti_detail_id')
                                    ->join('propertis','propertis.id','properti_details.properti_id')
                                    ->get();
                return view('admin/laporan.index',compact('datas'));
            }
        }
    }
}
