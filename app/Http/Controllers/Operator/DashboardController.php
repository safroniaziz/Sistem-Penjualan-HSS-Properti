<?php

namespace App\Http\Controllers\Operator;

use App\Http\Controllers\Controller;
use App\Properti;
use App\Transaksi;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function operatorDashboard(){
        $tahun = date('Y');
        $bulan = date('m');
        $hari = date('d');
        $laporan = [
            '0' =>  [
                'nm_bulan'  =>  'Januari',
                'jumlah'    =>  Transaksi::whereYear('created_at',$tahun)->whereMonth('created_at','=','01')->select(DB::raw('count(id) as jumlah'))->first()
            ],
            '1' =>  [
                'nm_bulan'  =>  'Februari',
                'jumlah'    =>  Transaksi::whereYear('created_at',$tahun)->whereMonth('created_at','=','02')->select(DB::raw('count(id) as jumlah'))->first()
            ],
            '2' =>  [
                'nm_bulan'  =>  'Maret',
                'jumlah'    =>  Transaksi::whereYear('created_at',$tahun)->whereMonth('created_at','=','03')->select(DB::raw('count(id) as jumlah'))->first()
            ],
            '3' =>  [
                'nm_bulan'  =>  'April',
                'jumlah'    =>  Transaksi::whereYear('created_at',$tahun)->whereMonth('created_at','=','04')->select(DB::raw('count(id) as jumlah'))->first()
            ],
            '4' =>  [
                'nm_bulan'  =>  'Mei',
                'jumlah'    =>  Transaksi::whereYear('created_at',$tahun)->whereMonth('created_at','=','05')->select(DB::raw('count(id) as jumlah'))->first()
            ],
            '5' =>  [
                'nm_bulan'  =>  'Juni',
                'jumlah'    =>  Transaksi::whereYear('created_at',$tahun)->whereMonth('created_at','=','06')->select(DB::raw('count(id) as jumlah'))->first()
            ],
            '6' =>  [
                'nm_bulan'  =>  'Juli',
                'jumlah'    =>  Transaksi::whereYear('created_at',$tahun)->whereMonth('created_at','=','07')->select(DB::raw('count(id) as jumlah'))->first()
            ],
            '7' =>  [
                'nm_bulan'  =>  'Agustus',
                'jumlah'    =>  Transaksi::whereYear('created_at',$tahun)->whereMonth('created_at','=','08')->select(DB::raw('count(id) as jumlah'))->first()
            ],
            '8' =>  [
                'nm_bulan'  =>  'September',
                'jumlah'    =>  Transaksi::whereYear('created_at',$tahun)->whereMonth('created_at','=','09')->select(DB::raw('count(id) as jumlah'))->first()
            ],
            '9' =>  [
                'nm_bulan'  =>  'Oktober',
                'jumlah'    =>  Transaksi::whereYear('created_at',$tahun)->whereMonth('created_at','=','10')->select(DB::raw('count(id) as jumlah'))->first()
            ],
            '10' =>  [
                'nm_bulan'  =>  'November',
                'jumlah'    =>  Transaksi::whereYear('created_at',$tahun)->whereMonth('created_at','=','11')->select(DB::raw('count(id) as jumlah'))->first()
            ],
            '11' =>  [
                'nm_bulan'  =>  'Desember',
                'jumlah'    =>  Transaksi::whereYear('created_at',$tahun)->whereMonth('created_at','=','12')->select(DB::raw('count(id) as jumlah'))->first()
            ],
        ];
        $jml_properti = Count(Properti::all());
        $jml_transaksi = Count(Transaksi::all());
        $jml_transaksi_bulan_ini = Count(Transaksi::whereMonth('created_at','=',$bulan)->whereYear('created_at','=',$tahun)->get());
        $jml_transaksi_hari_ini = Count(Transaksi::whereDay('created_at','=',$hari)->whereMonth('created_at','=',$bulan)->whereYear('created_at','=',$tahun)->get());
        return view('operator/dashboard',compact('laporan','jml_properti','jml_transaksi','jml_transaksi_bulan_ini','jml_transaksi_hari_ini'));
    }
}
