<?php 

namespace App\Http\Controllers;
use App\Models\Pelanggaran;
use App\Models\Pengajar;
use App\Models\Kategori;
use App\Models\Santri;
use App\Models\User;
use App\Models\Pondok;
use Auth;


class AdminController extends Controller
{

  function beranda(){
    $data['user'] = Auth::user();
    $data['santri'] = Santri::where('id_pondok', Auth::id())->count('id');
    $data['pengajar'] = Pengajar::where('id_pondok', Auth::id())->count('id');
    $data['pelanggaran'] = Pelanggaran::where('id_pondok', Auth::id())->count('id');
    return view('admin.beranda', $data);

}


}