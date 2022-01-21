<?php 

namespace App\Http\Controllers;
use App\Models\Pelanggaran;
use App\Models\Kategori;
use App\Models\Santri;
use App\Models\User;
use App\Models\Pondok;
use Auth;
use Hash;

class AdminProfilController extends Controller
{

  function index(){
    $data['user'] = Auth::user();
    return view('admin.profil.index', $data);

}

function updateProfil(Pondok $pondok){
	 $pondok->nama_pondok = request('nama_pondok');
        $pondok->nama_admin_pondok = request('nama_admin_pondok');
        $pondok->alamat = request('alamat');
        $pondok->no_hp = request('no_hp');
        $pondok->email = request('email');
        $pondok->sejarah = request('sejarah');
        $pondok->visi = request('visi');
        $pondok->misi = request('misi');
         $pondok->no_izin = request('no_izin');
        $pondok->handleUploadFoto();
        $pondok->save();

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