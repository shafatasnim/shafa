<?php 

namespace App\Http\Controllers;
use App\Models\Pelanggaran;
use App\Models\Santri;
use App\Models\Kategori;
use App\Models\Bukti;
use Auth;


class AdminPelanggaranController extends Controller
{

  function index(){
    $data['user'] = Auth::user();
    $data['list_kategori'] = Kategori::where('id_pondok', Auth::id())->get();
    $data['list_santri'] = Santri::where('id_pondok',Auth::id())->get();

    $data['list_pelanggaran'] = Pelanggaran::select('pelanggaran')
    ->join('santri','santri.id','=','pelanggaran.id_santri')
    ->join('bukti','bukti.id_pelanggaran','=','pelanggaran.id')
    ->join('kategori_pelanggaran','kategori_pelanggaran.id','=','pelanggaran.id_kategori')
    ->select('bukti.*','pelanggaran.*','pelanggaran.id as idp','santri.*','kategori_pelanggaran.*','kategori_pelanggaran.id as idk')
    ->where('pelanggaran.id_pondok',Auth::id())
    ->get();
    return view('admin.pelanggaran.index', $data);

}


function store(){
    //pelanggaran
    $pelanggaran = new Pelanggaran;
    $pelanggaran->id_pondok = Auth::id();
    $pelanggaran->id_kategori = request('id_kategori'); 
    $pelanggaran->id_santri = request('id_santri');
    $pelanggaran->tgl = request('tgl');
    $pelanggaran->deskripsi = request('deskripsi');
    $pelanggaran->save();
    

    //bukti
    $bukti = new Bukti;
    $bukti->id_pelanggaran = $pelanggaran->id;
    $bukti->handleUploadFoto();
    $bukti->save();

    return redirect('admin/pelanggaran')->with('success','Data Berhasil Ditambahkan');
}

function destroy(Pelanggaran $pelanggaran){
    $pelanggaran->delete();
    return redirect('admin/pelanggaran')->with('pelanggaran', 'Data Berhasil Dihapus');
}



function update (Pelanggaran $pelanggaran){
   $data['list_kategori'] = Kategori::where('id_pondok', Auth::id())->get();
    $pelanggaran->tgl = request('tgl');
    $pelanggaran->deskripsi = request('deskripsi');
    $pelanggaran->id_kategori = request('id_kategori');
    $pelanggaran->save();
    return redirect('admin/pelanggaran')->with('success','Data Berhasil Diubah');

}





}