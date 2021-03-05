<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class ManajerController extends Controller
{
    public function index(){
        $manajers = User::where('role','manajer')->get();
        return view('admin/manajer.index',compact('manajers'));
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
            'role'  => 'manajer',
        ]);

        return redirect()->route('admin.manajer')->with(['success'   =>  'Data Manajer Baru Berhasil Ditambahkan !!']);
    }

    // public function aktifkanStatus($id){
    //     User::where('id',$id)->update([
    //         'status_anggota'    =>  '1'
    //     ]);
    //     return redirect()->route('admin.manajer')->with(['success' =>  'Status Manajer Berhasil Di Aktifkan !!']);
    // }

    // public function nonaktifkanStatus($id){
    //     User::where('id',$id)->update([
    //         'status_anggota'    =>  '0'
    //     ]);
    //     return redirect()->route('admin.manajer')->with(['success' =>  'Status Manajer Berhasil Di Nonaktifkan !!']);
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

        return redirect()->route('admin.manajer')->with(['success'   =>  'Data Manajer Berhasil Diubah !!']);
    }

    public function delete(Request $request){
        User::where('id',$request->id)->delete();
        return redirect()->route('admin.manajer')->with(['success'   =>  'Data Manajer Berhasil Dihapus !!']);
    }

    public function updatePassword(Request $request){
        User::where('id',$request->id)->update([
            'password'  =>  bcrypt($request->password_baru),
        ]);

        return redirect()->route('admin.manajer')->with(['success'   =>  'Password Manajer Berhasil Diubah !!']);
    }
}
