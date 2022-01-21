<?php 

namespace App\Http\Controllers;
use Illuminate\Pagination\CursorPaginator;
use Illuminate\Pagination\Paginator;
use App\Models\Pengajar;
use App\Models\Absensi;
use App\Models\Santri;
use Auth;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;
use App\Models\UserDetail;



class PengajarAbsensiController extends Controller{

    function index(Pengajar $pengajar){
        $data['user'] = Auth::user();
         $now = Carbon::yesterday();
         $sekarang = Carbon::now();
         $data['sekarang'] = Carbon::yesterday()->format('l, d M Y');

        $data['list_absensi'] = Absensi::select('absensi')
        ->join('santri','santri.id','=','absensi.id_santri')
        ->where('absensi.id_pengajar',Auth::id())
        ->where('absensi.tanggal','>',$now)
        ->select('absensi.*','santri.*','santri.nama as nama_santri','absensi.id as idp')
        ->paginate(10); 

      
        // $data['list_santri'] = DB::table('santri')
        //     ->join('pengajar', 'pengajar.id_pondok', '=', 'santri.id_pondok')
        //     ->select('santri.*','pengajar.*','santri.id as idp')
        //     ->where('santri.id_pondok',Auth::user()->id_pondok)
        //     ->get();

        $data['list_santri'] = Santri::where('santri.id_pondok', Auth::user()->id_pondok)->get();

        $data['list_history'] = Absensi::select('absensi')
        ->join('santri','santri.id','=','absensi.id_santri')
        ->where('absensi.id_pengajar',Auth::id())
        ->where('absensi.tanggal','<',$sekarang)
        ->select('absensi.*','santri.*','santri.nama as nama_santri','absensi.id as idp')
        ->paginate(3); 




// Query Builder approach
        return view('pengajar.absensi.index', $data);

    }

    function history(){
        $data['user'] = Auth::user();
         $now = Carbon::yesterday();
         $sekarang = Carbon::now();
         $data['sekarang'] = Carbon::yesterday()->format('l, d M Y');


        $data['list_santri'] = Santri::where('santri.id_pondok', Auth::user()->id_pondok)->get();

        $data['list_history'] = Absensi::select('absensi')
        ->join('santri','santri.id','=','absensi.id_santri')
        ->where('absensi.tanggal','<',$now)
        ->where('absensi.id_pengajar',Auth::id())
        ->select('absensi.*','santri.*','santri.nama as nama_santri','absensi.id as idp')
        ->simplePaginate(10); 




// Query Builder approach
        return view('pengajar.absensi.history', $data);
    }

    function cetak(){
        $data['user'] = Auth::user();
        $tgl1 = request('tgl1');
        $tgl2 = request('tgl2');
        $data['list_absensi'] = Absensi::whereBetween('tanggal',[$tgl1, $tgl2])->get();
        $data['list_absensi'] = Absensi::select('absensi')
        ->join('santri','santri.id','=','absensi.id_santri')
        ->whereBetween('tanggal',[$tgl1, $tgl2])
        ->where('absensi.id_pengajar',Auth::id())
        ->select('absensi.*','santri.*','santri.nama as nama_santri','absensi.id as idp')
        ->get(); 


        return view('pengajar.absensi.cetak',$data);
    }


    function store(Request $request){

        $id_santri        = $request->id_santri;
        $status_kehadiran = $request->status_kehadiran;

        $now = Carbon::now();

        for($i = 0; $i<count($id_santri);$i++){
            $datasave = [
                'id_santri' => $id_santri[$i],
                'id_pengajar' => Auth::id(),
                'tanggal' => $now,
                'created_at' => $now,
                'status_kehadiran' => $status_kehadiran[$i],

            ];
            DB::table('absensi')->insert($datasave);
        }
            return redirect()->back()->with("success","Absensi Hari Ini telah dibuat");

  }

  function update(Absensi $absensi){

    $absensi->status_kehadiran = request('status_kehadiran');
    $absensi->save();
    return redirect()->back()->with("success","Absensi berhasil diupdate");

  }

  function destroy(Absensi $absensi){
    $absensi->delete();
    return redirect()->back()->with("danger","Absensi berhasil Dihapus");

  }




}