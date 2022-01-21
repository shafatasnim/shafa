<?php 

namespace App\Http\Controllers;
use Illuminate\Pagination\CursorPaginator;
use Illuminate\Pagination\Paginator;
use App\Models\Pengajar;
use App\Models\Hafalan;
use App\Models\Absensi;
use App\Models\Santri;
use Auth;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;
use App\Models\UserDetail;



class OrangtuaHafalanController extends Controller{

    function index(Pengajar $pengajar){
        $data['user'] = Auth::user();
        $now = Carbon::yesterday();
        $sekarang = Carbon::now();
        $data['sekarang'] = Carbon::yesterday()->format('l, d M Y');


        $data['list_hafalan'] = Hafalan::select('hafalan')
        ->join('santri','santri.id','=','hafalan.id_santri')
        ->select('santri.*','hafalan.id as idp','hafalan.*')
        ->where('santri.no_kk',Auth::user()->no_kk)
        ->paginate(10); 

        return view('orangtua.hafalan.index', $data);

    }



}