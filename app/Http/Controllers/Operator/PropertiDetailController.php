<?php

namespace App\Http\Controllers\Operator;

use App\Http\Controllers\Controller;
use App\Properti;
use App\PropertiDetail;
use Illuminate\Http\Request;

class PropertiDetailController extends Controller
{
    public function index(){
        $propertis = Properti::all();
        $details = PropertiDetail::join('propertis','propertis.id','properti_details.properti_id')->select('nm_properti','jenis_properti','alamat','harga','panjang','lebar','luas','status')->get();
        return view('operator/properti_detail.index', compact('details','propertis'));
    }

    public function post(Request $request){
        $this->validate($request,[
            'properti_id'   =>  'required',
            'no_kavling'   =>  'required',
            'harga'   =>  'required',
            'panjang'   =>  'required',
            'lebar'   =>  'required',
            'luas'   =>  'required',
        ]);

        PropertiDetail::create([
            'properti_id'   =>  $request->properti_id,
            'harga'   =>  $request->harga,
            'no_kavling'   =>  $request->no_kavling,
            'panjang'   =>  $request->panjang,
            'lebar'   =>  $request->lebar,
            'luas'   =>  $request->luas,
            'status'    =>  'tersedia'
        ]); 

        return redirect()->route('operator.properti_detail')->with(['success' =>  'Data Properti Detail Berhasil Ditambahkan']);
    }

    public function delete(Request $request){
        $this->validate($request,[
            'id'    =>  'required'
        ]);

        PropertiDetail::where('id',$request->id)->delete();
        return redirect()->route('operator.properti_detail')->with(['success' =>  'Data Properti Detail Berhasil Dihapus']);
    }

    public function edit($id){
        $properti = PropertiDetail::find($id);
        return $properti;
    }
}
