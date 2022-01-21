<?php 

namespace App\Http\Controllers;
use App\Models\Kategori;
use Auth;


class AdminKategoriPelanggaranController extends Controller
{

  function index(){
    $data['list_kategori'] = Kategori::where('id_pondok', Auth::id())->get();
    $data['user'] = Auth::user();
    return view('admin.kategori.index', $data);

}


function store(){
    $kategori = new Kategori;
    $kategori->id_pondok = Auth::id();
    $kategori->kategori_pelanggaran = request('kategori_pelanggaran');
    $kategori->save();
    return redirect('admin/kategori')->with('success','Data Berhasil Ditambahkan');    

}


 function destroy(Kategori $kategori){
        $kategori->delete();
        return redirect('admin/kategori')->with('succes', 'Data Berhasil Dihapus');

}





}