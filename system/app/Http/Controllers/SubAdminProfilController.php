<?php 

namespace App\Http\Controllers;
use App\Models\Pelanggaran;
use App\Models\Kategori;
use App\Models\Santri;
use App\Models\Pengajar;
use App\Models\User;
use App\Models\Pondok
;use App\Models\Subadmin;
use Auth;
use Hash;


class SubAdminProfilController extends Controller{

  function index(){
    $data['user'] = Auth::user();
    return view('subadmin.profil.index', $data);

}

 function store(Subadmin $subadmin){
        $subadmin = new Subadmin;
        $subadmin->nama = request('nama');
        $subadmin->email = request('email');
        $subadmin->notlp = request('notlp');
        $subadmin->alamat = request('alamat');
        $subadmin->password = bcrypt(request('password'));  		  
        $subadmin->handleUploadFoto();
        $subadmin->save();
		return back()->withInput()->with("success","Super admin berhasil dibuat");
  }

   function update(Subadmin $subadmin){
        $subadmin->nama = request('nama');
        $subadmin->email = request('email');
        $subadmin->notlp = request('notlp');
        $subadmin->alamat = request('alamat');
        $subadmin->handleUploadFoto();
        $subadmin->save();
    return back()->withInput()->with("success","Profil diUpdate");
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