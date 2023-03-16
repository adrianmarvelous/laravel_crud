<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MhsController extends Controller
{
    /*
    public function index(){
        $mahasiswa = DB::table('mahasiswa')->get();

        return view('index',['mahasiswa' =>$mahasiswa]);
    }

    public function index_matkul(){
        $matkul = DB::select('SELECT mahasiswa.*, mata_kuliah.* FROM mahasiswa JOIN mata_kuliah ON mahasiswa.id = mata_kuliah.id_mahasiswa WHERE mata_kuliah.nim = $mahasiswa->nim');
        return view('matkul',['matkul' => $matkul]);
    }
*/
    public function index(){
        $mahasiswa = DB::table('mahasiswa')->get();
        
        foreach($mahasiswa as $mhs){
            echo $id_mhs = $mhs->id;
            $matkul = DB::select('SELECT mahasiswa.*, mata_kuliah.* FROM mahasiswa JOIN mata_kuliah ON mahasiswa.id = mata_kuliah.id_mahasiswa WHERE mahasiswa.id = $id_mhs');
        }

        //$matkul = DB::select('SELECT mahasiswa.*, mata_kuliah.* FROM mahasiswa JOIN mata_kuliah ON mahasiswa.id = mata_kuliah.id_mahasiswa');
        //$matkul = DB::table('mata_kuliah')->where('id_mahasiswa',$mahasiswa->id)

    return view('index', compact('mahasiswa'/*, 'matkul'*/));
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

    /*public function matkul(){
        $matkul = DB::select('SELECT mahasiswa.*, mata_kuliah.* FROM mahasiswa JOIN mata_kuliah ON mahasiswa.id = mata_kuliah.id_mahasiswa');
        return view('matkul',['matkul' => $matkul]);
    }*/

}
