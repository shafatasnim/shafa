<?php 

namespace App\Http\Controllers;
use App\Models\Santri;
use App\Models\Orangtua;
use Auth;
use Illuminate\Pagination\Paginator;


class AdminSantriController extends Controller
{

  function index(){
    $data['list_santri'] = Santri::where('id_pondok', Auth::id())->paginate(10);
    $data['user'] = Auth::user();
    return view('admin.santri.index', $data);

  }

  function create1(){
    $data['user'] = Auth::user();
    return view('admin.santri.santri', $data);

  }

  function create2(){
    $data['user'] = Auth::user();
    $data['list_orangtua'] = Orangtua::where('id_pondok', Auth::id())->get();
    return view('admin.santri.saudara', $data);

  }


  function store(){
    //Orangtua
   $orangtua = new Orangtua;
   $orangtua->id_pondok = Auth::id();
   $orangtua->nama_ayah = request('nama_ayah');
   $orangtua->nama_ibu = request('nama_ibu');
   $orangtua->no_kk = request('no_kk');
   $orangtua->nik_ayah = request('nik_ayah');
   $orangtua->nik_ibu = request('nik_ibu');
   $orangtua->tpt_lhr_ayah = request('tpt_lhr_ayah');
   $orangtua->tpt_lhr_ibu = request('tpt_lhr_ibu');
   $orangtua->tgl_lhr_ayah = request('tgl_lhr_ayah');
   $orangtua->tgl_lhr_ibu = request('tgl_lhr_ibu');
   $orangtua->no_hp_ayah = request('no_hp_ayah');
   $orangtua->no_hp_ibu = request('no_hp_ibu');
   $orangtua->status_ayah = request('status_ayah');
   $orangtua->status_ibu = request('status_ibu');
   $orangtua->email = request('email');
   $orangtua->password = bcrypt(request('no_kk'));
   $orangtua->save();

    //Santri
   $santri = new Santri;
   $santri->id_pondok = Auth::id();
   $santri->nama = request('nama');
   $santri->nik = request('nik');
   $santri->no_kk = request('no_kk');
   $santri->jenjang = request('jenjang');
   $santri->tempat_lahir = request('tempat_lahir');
   $santri->tgl_lahir = request('tgl_lahir');
   $santri->jk = request('jk');
   $santri->handleUploadFoto();

   $santri->save();
   return redirect('admin/santri')->with('success','Data Berhasil Ditambahkan');

 }
 function store2(){

  $santri = new Santri;
  $santri->id_pondok = Auth::id();
  $santri->no_kk = request('no_kk');
  $santri->nama = request('nama');
  $santri->nik = request('nik');
  $santri->jenjang = request('jenjang');
  $santri->tempat_lahir = request('tempat_lahir');
  $santri->tgl_lahir = request('tgl_lahir');
  $santri->jk = request('jk');
  $santri->handleUploadFoto();

  $santri->save();
  return redirect('admin/santri')->with('success','Data Berhasil Ditambahkan');

}

function editsantri(Santri $santri){
  $data['user'] = Auth::user();
  $data['santri'] = $santri;
  return view('admin.santri.editsantri',$data);

}

function editortu(Orangtua $orangtua){
  $data['user'] = Auth::user();
  $data['orangtua'] = $orangtua;
  return view('admin.santri.editortu',$data);

}

function destroy(Santri $santri){
  $santri->delete();
  return redirect('admin/santri')->with('santri', 'Data Berhasil Dihapus');
}

function updateSantri(santri $santri){
//Santri
  $santri->id_pondok = Auth::id();
  $santri->nama = request('nama');
  $santri->nik = request('nik');
  $santri->jenjang = request('jenjang');
  $santri->tempat_lahir = request('tempat_lahir');
  $santri->tgl_lahir = request('tgl_lahir');
  $santri->jk = request('jk');

  $santri->save();
  return redirect('admin/santri')->with('santri', 'Data Berhasil Diubah');
}

function updateOrtu(Orangtua $orangtua){                                                                             

  $orangtua->nama_ayah = request('nama_ayah');
  $orangtua->nama_ibu = request('nama_ibu');
  $orangtua->no_kk = request('no_kk');
  $orangtua->nik_ayah = request('nik_ayah');
  $orangtua->nik_ibu = request('nik_ibu');
  $orangtua->tpt_lhr_ayah = request('tpt_lhr_ayah');
  $orangtua->tpt_lhr_ibu = request('tpt_lhr_ibu');
  $orangtua->tgl_lhr_ayah = request('tgl_lhr_ayah');
  $orangtua->tgl_lhr_ibu = request('tgl_lhr_ibu');
  $orangtua->no_hp_ayah = request('no_hp_ayah');
  $orangtua->no_hp_ibu = request('no_hp_ibu');
  $orangtua->status_ayah = request('status_ayah');
  $orangtua->status_ibu = request('status_ibu');
  $orangtua->email = request('email');
  $orangtua->password = bcrypt(request('no_kk'));
  $orangtua->save();

  return redirect('admin/santri')->with('santri', 'Data Berhasil Diubah');

}

function show(Santri $santri){
  $data['user'] = Auth::user();
  $data['santri'] = $santri;
  $data['list_ortu'] = Orangtua::where('no_kk',$santri->no_kk)->get();
  return view('admin.santri.show',$data);

}

}