<?php 

namespace App\Http\Controllers;
use App\Models\Pelanggaran;
use App\Models\Santri;
use App\Models\Kategori;
use App\Models\Orangtua;
use Auth;


class AdminOrtuController extends Controller
{

  function index(){
    $data['user'] = Auth::user();
    $data['list_orangtua'] = Orangtua::all();
    $data['list_orangtua'] = Orangtua::select('orangtua')
    ->join('santri','santri.id_ortu','=','orangtua.id')
    ->where('orangtua.id_pondok',Auth::id())
    ->select('santri.*','orangtua.*')
    ->get();
    return view('admin.orangtua.index', $data);

}


function store(){
    $pelanggaran = new Pelanggaran;
    $pelanggaran->id_pondok = Auth::id();
    $pelanggaran->id_pelanggaran = request('id_pelanggaran'); 
    $pelanggaran->id_santri = request('id_santri');
    $pelanggaran->tgl = request('tgl');
    $pelanggaran->deskripsi = request('deskripsi');
    $pelanggaran->save();
    return redirect('admin/pelanggaran')->with('success','Data Berhasil Ditambahkan');

}

function destroy(Pelanggaran $pelanggaran){
    $pelanggaran->delete();
    return redirect('admin/pelanggaran')->with('pelanggaran', 'Data Berhasil Dihapus');
}



function update(Pelanggaran $pelanggaran){
    $data['user'] = Auth::user();
    $pelanggaran->tgl = request('tgl');
    $pelanggaran->deskripsi = request('deskripsi');
    $pelanggaran->save();
    return redirect('admin/pelanggaran')->with('success','Data Berhasil Diubah');

}





}