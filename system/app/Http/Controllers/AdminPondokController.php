<?php 

namespace App\Http\Controllers;
use App\Models\Pondok;
use Auth;
 

 class AdminPondokController extends Controller
 {

 	function index(){
        $data['user'] = Auth::user();
 		return view('admin.pondok.index', $data);

 	}

  function update(Pondok $pondok){
        $pondok->nama_pondok = request('nama_pondok');
        $pondok->nama_admin_pondok = request('nama_admin_pondok');
        $pondok->alamat = request('alamat');
        $pondok->no_hp = request('no_hp');
        $pondok->email = request('email');
        $pondok->no_izin = request('no_izin');
        $pondok->password = bcrypt(request('no_hp'));
        $pondok->handleUploadFoto();
        $pondok->save();
        return back()->withInput()->with('success','Data Berhasil Ditambahkan');

    }




    
}