<?php 

namespace App\Http\Controllers;
use Illuminate\Pagination\CursorPaginator;
use Illuminate\Pagination\Paginator;
use App\Models\Pelanggaran;
use App\Models\Kategori;
use App\Models\Santri;
use App\Models\User;
use App\Models\Pondok;
use App\Models\Absensi;
use Auth;


class OrangtuaAbsensiController extends Controller{

  function index(){
    $data['user'] = Auth::user();
    $data['list_absensi'] = Absensi::select('absensi')
    ->join('santri','santri.id','=','absensi.id_santri')
    ->join('pengajar','pengajar.id','=','absensi.id_pengajar')
    ->where('santri.no_kk', Auth::user()->no_kk)
    ->select('absensi.*','santri.*','pengajar.*')
    ->paginate(10);
    return view('orangtua.absensi.index', $data);

}


}