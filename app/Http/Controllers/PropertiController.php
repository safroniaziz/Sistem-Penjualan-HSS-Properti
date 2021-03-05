<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Properti;
use Illuminate\Http\Request;

class PropertiController extends Controller
{
    public function index(){
        $properties = Properti::leftJoin('properti_details','properti_details.properti_id','propertis.id')->select('propertis.id as id','nm_properti','jenis_properti','alamat','jumlah_kavling')->groupBy('propertis.id')->get();
        return view('admin/properti.index', compact('properties'));
    }

    public function post(Request $request){
        $this->validate($request,[
            'nm_properti'   =>  'required',
            'jenis_properti'   =>  'required',
            'alamat'   =>  'required',
            'jumlah_kavling'   =>  'required',
        ]);

        Properti::create([
            'nm_properti'   =>  $request->nm_properti,
            'jenis_properti'   =>  $request->jenis_properti,
            'alamat'   =>  $request->alamat,
            'jumlah_kavling'   =>  $request->jumlah_kavling,
        ]); 

        return redirect()->route('admin.properti')->with(['success' =>  'Data Properti Berhasil Ditambahkan']);
    }

    public function delete(Request $request){
        $this->validate($request,[
            'id'    =>  'required'
        ]);

        Properti::where('id',$request->id)->delete();
        return redirect()->route('admin.properti')->with(['success' =>  'Data Properti Berhasil Dihapus']);
    }

    public function edit($id){
        $properti = Properti::find($id);
        return $properti;
    }
}
