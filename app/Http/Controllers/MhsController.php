<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MhsController extends Controller
{
    
    public function index(){
        $mahasiswa = DB::table('mahasiswa')->get();

        return view('index',['mahasiswa' =>$mahasiswa]);
    }

    public function tambah(){
        return view('tambah');
    }

    public function store(Request $request){
        DB::table('mahasiswa')->insert([
            'nama' =>$request->nama,
            'nim' =>$request->nim
        ]);

        return redirect('/mahasiswa');
    }

    public function edit($id){
        $mahasiswa = Db::table('mahasiswa')->where('id',$id)->get();
        return view('edit',['mahasiswa' => $mahasiswa]);
    }

    public function update(Request $request){
        DB::table('mahasiswa')->where('id',$request->id)->update([
            'nama' => $request->nama,
            'nim' => $request->nim,
        ]);

        return redirect('/mahasiswa');
    }

    public function hapus($id){
        DB::table('mahasiswa')->where('id',$id)->delete();

        return redirect('/mahasiswa');
    }
}
