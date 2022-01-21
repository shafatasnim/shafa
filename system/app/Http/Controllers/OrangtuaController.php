<?php 

namespace App\Http\Controllers;
use App\Models\Pelanggaran;
use App\Models\Kategori;
use App\Models\Santri;
use App\Models\User;
use App\Models\Pondok;
use Auth;


class OrangtuaController extends Controller{

  function beranda(){
    $data['user'] = Auth::user();
    $data['list_pondok'] = Pondok::select('pondok')
    ->join('orangtua','orangtua.id_pondok','=','pondok.id')
    ->select('pondok.*','orangtua.*')
    ->get();
    return view('orangtua.beranda', $data);

}


}