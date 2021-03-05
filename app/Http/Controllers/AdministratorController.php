<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class AdministratorController extends Controller
{
    public function index(){
        $administrators = User::where('role','administrator')->get();
        return view('admin/administrator.index',compact('administrators'));
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
            'role'  => 'administrator',
        ]);

        return redirect()->route('admin.administrator')->with(['success'   =>  'Data Manajer Baru Berhasil Ditambahkan !!']);
    }

    // public function aktifkanStatus($id){
    //     User::where('id',$id)->update([
    //         'status_anggota'    =>  '1'
    //     ]);
    //     return redirect()->route('admin.administrator')->with(['success' =>  'Status Manajer Berhasil Di Aktifkan !!']);
    // }

    // public function nonaktifkanStatus($id){
    //     User::where('id',$id)->update([
    //         'status_anggota'    =>  '0'
    //     ]);
    //     return redirect()->route('admin.administrator')->with(['success' =>  'Status Manajer Berhasil Di Nonaktifkan !!']);
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

        return redirect()->route('admin.administrator')->with(['success'   =>  'Data Manajer Berhasil Diubah !!']);
    }

    public function delete(Request $request){
        User::where('id',$request->id)->delete();
        return redirect()->route('admin.administrator')->with(['success'   =>  'Data Manajer Berhasil Dihapus !!']);
    }

    public function updatePassword(Request $request){
        User::where('id',$request->id)->update([
            'password'  =>  bcrypt($request->password_baru),
        ]);

        return redirect()->route('admin.administrator')->with(['success'   =>  'Password Manajer Berhasil Diubah !!']);
    }
}
