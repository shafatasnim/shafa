<?php 

namespace App\Http\Controllers;
use App\Models\Pelanggaran;
use App\Models\Kategori;
use App\Models\Santri;
use App\Models\Pengajar;
use App\Models\User;
use App\Models\Pondok;
use Auth;
use Hash;


class PengajarProfilController extends Controller{

  function index(){
    $data['user'] = Auth::user();
    return view('pengajar.profil.index', $data);

}

 function updateProfil(Pengajar $pengajar){
  		$pengajar->id_pondok = Auth::id();
        $pengajar->nama_pengajar = request('nama_pengajar');
        $pengajar->nama_majelis = request('nama_majelis');
        $pengajar->jenis_majelis = request('jenis_majelis');
        $pengajar->alamat = request('alamat');
        $pengajar->no_hp = request('no_hp');
        $pengajar->email = request('email');
        $pengajar->handleUploadFoto();
        $pengajar->save();
		return back()->withInput()->with("success","Profil berhasil diperbaharui");
  }

    function change(){
      $data = request()->all();

      if(request('current')){
         $user = Auth::user();
         $check = Hash::check(request('current'), $user->password);
         if($check){
            if(request('new') == request('confirm')){

               $user->password = bcrypt(request('new'));
               $user->save();

               return back()->with('success', 'Password Berhasil Diganti');

            }else{
            return back()->with('danger', 'Password Baru Tidak cocok');

            }
         }else{
            return back()->with('danger', 'Password Sekarang Salah');
         }
         
      }else{


      }
   }


}