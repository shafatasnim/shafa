<?php 

namespace App\Http\Controllers;
use Illuminate\Pagination\CursorPaginator;
use Illuminate\Pagination\Paginator;
use App\Models\Pengajar;
use App\Models\Prestasi;
use App\Models\Absensi;
use App\Models\Santri;
use Auth;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;
use App\Models\UserDetail;



class PengajarPrestasiController extends Controller{

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

        $data['list_prestasi'] = Prestasi::select('prestasi')
        ->join('santri','santri.id','=','prestasi.id_santri')
        ->select('santri.*','prestasi.id as idp','prestasi.*')
        ->where('santri.id_pondok',Auth::user()->id_pondok)
        ->where('prestasi.id_pengajar', Auth::id())
        ->paginate(10); 

        return view('pengajar.prestasi.index', $data);

    }


    function store(){

        $prestasi = new Prestasi;
        $prestasi->id_pengajar = Auth::id();
        $prestasi->id_santri = request('id_santri');
        $prestasi->nama_prestasi = request('nama_prestasi');
        $prestasi->tanggal = request('tanggal');
        $prestasi->save();
        return back()->withInput()->with("success","Prestasi berhasil dibuta");


    }

    function update(Prestasi $prestasi){
       $prestasi->id_santri = request('id_santri');
        $prestasi->nama_prestasi = request('nama_prestasi');
        $prestasi->tanggal = request('tanggal');
        $prestasi->save();
        return redirect()->back()->with("success","Prestasi berhasil diupdate");

    }

    function destroy(Prestasi $prestasi){
        $prestasi->delete();
        return redirect()->back()->with("danger","Prestasi berhasil Dihapus");

    }




}