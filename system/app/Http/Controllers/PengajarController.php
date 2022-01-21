<?php 

namespace App\Http\Controllers;
use App\Models\Pelanggaran;
use App\Models\Kategori;
use App\Models\Santri;
use App\Models\User;
use App\Models\Pondok;
use Auth;


class PengajarController extends Controller{

  function beranda(){
    $data['user'] = Auth::user();
    $data['santri'] = Santri::where('id_pondok', Auth::user()->id_pondok)->count();
    $data['pelanggaran'] = Pelanggaran::where('id_pondok', Auth::user()->id_pondok)->count();
    return view('pengajar.beranda', $data);

}


}