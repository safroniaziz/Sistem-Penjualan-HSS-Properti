<?php

namespace App\Http\Controllers\Manajer;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class OperatorController extends Controller
{
    public function index(){
        $operators = User::where('role','operator')->get();
        return view('manajer/operator.index',compact('operators'));
    }

    public function post(Request $request){
        $this->validate($request, [
            'name'  =>  'required',
            'email'  =>  'required',
            'password'  =>  'required',
        ]);

        User::create([
            'name'  =>  $request->name,
            'email'    =>  $request->email,
            'password'    =>  bcrypt($request->password),
            'role'  => 'operator',
        ]);

        return redirect()->route('manajer.operator')->with(['success'   =>  'Data operator Baru Berhasil Ditambahkan !!']);
    }

    // public function aktifkanStatus($id){
    //     User::where('id',$id)->update([
    //         'status_anggota'    =>  '1'
    //     ]);
    //     return redirect()->route('manajer.operator')->with(['success' =>  'Status operator Berhasil Di Aktifkan !!']);
    // }

    // public function nonaktifkanStatus($id){
    //     User::where('id',$id)->update([
    //         'status_anggota'    =>  '0'
    //     ]);
    //     return redirect()->route('manajer.operator')->with(['success' =>  'Status operator Berhasil Di Nonaktifkan !!']);
    // }

    public function edit($id){
        $data = User::find($id);
        return $data;
    }

    public function update(Request $request){
        $this->validate($request, [
            'name'  =>  'required',
            'email'  =>  'required',
        ]);
        User::where('id',$request->id)->update([
            'name'  =>  $request->name,
            'email'    =>  $request->email,
        ]);

        return redirect()->route('manajer.operator')->with(['success'   =>  'Data operator Berhasil Diubah !!']);
    }

    public function delete(Request $request){
        User::where('id',$request->id)->delete();
        return redirect()->route('manajer.operator')->with(['success'   =>  'Data operator Berhasil Dihapus !!']);
    }

    public function updatePassword(Request $request){
        User::where('id',$request->id)->update([
            'password'  =>  bcrypt($request->password_baru),
        ]);

        return redirect()->route('manajer.operator')->with(['success'   =>  'Password operator Berhasil Diubah !!']);
    }
}
