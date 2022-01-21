<?php 

namespace App\Http\Controllers;
use Illuminate\Pagination\CursorPaginator;
use Illuminate\Pagination\Paginator;
use App\Models\Pengajar;
use App\Models\Pelanggaran;
use App\Models\Hafalan;
use App\Models\Absensi;
use App\Models\Santri;
use Auth;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;
use App\Models\UserDetail;



class OrangtuaPelanggaranController extends Controller{

    function index(Pengajar $pengajar){
        $data['user'] = Auth::user();
        $now = Carbon::yesterday();
        $sekarang = Carbon::now();
        $data['sekarang'] = Carbon::yesterday()->format('l, d M Y');


        $data['list_pelanggaran'] = Pelanggaran::select('pelanggaran')
        ->join('bukti','bukti.id_pelanggaran','=','pelanggaran.id')
        ->join('santri','santri.id','=','pelanggaran.id_santri')
        ->join('kategori_pelanggaran','kategori_pelanggaran.id','=','pelanggaran.id_kategori')
        ->where('santri.no_kk', Auth::user()->no_kk)
        ->select('pelanggaran.*','santri.*','bukti.*','bukti.foto as buktinya','pelanggaran.id as idp','kategori_pelanggaran.*')
        ->paginate(10);

        return view('orangtua.pelanggaran.index', $data);

    }



}