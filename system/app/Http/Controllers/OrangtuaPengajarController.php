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



class OrangtuaPengajarController extends Controller{

    function index(Pengajar $pengajar){
        $data['user'] = Auth::user();
       $data['list_pengajar'] = Pengajar::where('id_pondok', Auth::user()->id_pondok)->get(); 

        return view('orangtua.pengajar.index', $data);

    }


    function store(){

        $hafalan = new Hafalan;
        $hafalan->id_pengajar = Auth::id();
        $hafalan->id_santri = request('id_santri');
        $hafalan->surah = request('surah');
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