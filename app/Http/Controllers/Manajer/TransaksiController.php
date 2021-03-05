<?php

namespace App\Http\Controllers\Manajer;

use App\Http\Controllers\Controller;
use App\Properti;
use App\PropertiDetail;
use App\Transaksi;
use Illuminate\Http\Request;
use PDF;

class TransaksiController extends Controller
{
    public function index(){
        $properties = Properti::all();
        $transaksis = Transaksi::join('properti_details','properti_details.id','transaksis.properti_detail_id')
                                ->join('propertis','propertis.id','properti_details.properti_id')
                                ->select('transaksis.id','nm_konsumen','transaksis.created_at','jenis_properti','nm_properti','nik','pekerjaan','propertis.alamat','no_hp','booking','sisa_pembayaran','jenis_pembayaran')
                                ->get();
        return view('manajer/transaksi.index',compact('properties','transaksis'));
    }

    public function post(Request $request){
        $this->validate($request,[
            'properti_detail_id'   =>  'required',
            'nm_konsumen'   =>  'required',
            'nik'   =>  'required',
            'pekerjaan'   =>  'required',
            'alamat'   =>  'required',
            'no_hp'   =>  'required',
            'booking'   =>  'required',
            'sisa_pembayaran'   =>  'required',
            'jenis_pembayaran'   =>  'required',
        ]);

        Transaksi::create([
            'properti_detail_id'   =>  $request->properti_detail_id,
            'nm_konsumen'   =>  $request->nm_konsumen,
            'nik'   =>  $request->nik,
            'pekerjaan'   =>  $request->pekerjaan,
            'alamat'   =>  $request->alamat,
            'no_hp'   =>  $request->no_hp,
            'booking'   =>  $request->booking,
            'sisa_pembayaran'   =>  $request->sisa_pembayaran,
            'jenis_pembayaran'   =>  $request->jenis_pembayaran,
        ]);
        
        PropertiDetail::where('id',$request->properti_detail_id)->update([
            'status'    =>  'terjual',
        ]);

        $properti = PropertiDetail::join('propertis','propertis.id','properti_details.properti_id')->where('properti_details.id',$request->properti_detail_id)->select('nm_properti','no_kavling')->first();

        return redirect()->route('manajer.transaksi')->with(['success'    =>  'Transaksi untuk "'.$properti->nm_properti.'" dengan nomor kavling "'.$properti->no_kavling.'" berhasil dilakukan !!']);
    }

    public function cariDetail(Request $request){
        $properti_id = $request->properti_id;
        $details = PropertiDetail::select('id','no_kavling')
                                ->where('properti_id',$properti_id)
                                ->get();
        return $details;
    }

    public function cetakLaporan($id){
        $data = Transaksi::join('properti_details','properti_details.id','transaksis.properti_detail_id')
                            ->join('propertis','propertis.id','properti_details.properti_id')
                            ->where('transaksis.id',$id)
                            ->first();
        $pdf = PDF::loadview('manajer.transaksi.laporan',[
            'data'  =>  $data
        ]);
        // return $pdf->download('operator.transaksi.laporan');
        return $pdf->stream();
    }
}
