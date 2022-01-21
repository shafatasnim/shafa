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



class PengajarHafalanController extends Controller{

    function index(Pengajar $pengajar){
        $data['user'] = Auth::user();
        $now = Carbon::yesterday();
        $sekarang = Carbon::now();
        $data['sekarang'] = Carbon::yesterday()->format('l, d M Y');

        // $data['list_santri'] = DB::table('santri')
        // ->join('pengajar', 'pengajar.id_pondok', '=', 'santri.id_pondok')
        // ->select('santri.*','pengajar.*','santri.id as idp')
        // ->where('santri.id_pondok',Auth::user()->id_pondok)
        // ->get();

        $data['list_santri'] = Santri::where('santri.id_pondok', Auth::user()->id_pondok)->get();

        $data['list_hafalan'] = Hafalan::select('hafalan')
        ->join('santri','santri.id','=','hafalan.id_santri')
        ->select('santri.*','hafalan.id as idp','hafalan.*')
        ->where('santri.id_pondok',Auth::user()->id_pondok)
        ->where('hafalan.id_pengajar', Auth::id())
        ->paginate(10); 

        return view('pengajar.hafalan.index', $data);

    }


    function store(){

        $hafalan = new Hafalan;
        $hafalan->id_pengajar = Auth::id();
        $hafalan->id_santri = request('id_santri');
        $hafalan->surah = request('surah');
        $hafalan->juz = request('juz');
        $hafalan->ayat1 = request('ayat1');
        $hafalan->ayat2 = request('ayat2');
        $hafalan->tanggal = request('tanggal');
        $hafalan->save();
        return back()->withInput()->with("success","Hafalan berhasil dibuta");


    }

    function update(Hafalan $hafalan){

        $hafalan->id_pengajar = Auth::id();
        $hafalan->id_santri = request('id_santri');
        $hafalan->surah = request('surah');
        $hafalan->juz = request('juz');
        $hafalan->ayat1 = request('ayat1');
        $hafalan->ayat2 = request('ayat2');
        $hafalan->tanggal = request('tanggal');
        $hafalan->save();
        return redirect()->back()->with("success","Hafalan berhasil diupdate");

    }

    function destroy(Hafalan $hafalan){
        $hafalan->delete();
        return redirect()->back()->with("danger","Hafalan berhasil Dihapus");

    }




}