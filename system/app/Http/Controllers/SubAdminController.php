<?php 

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Pondok;
use App\Models\Santri;
use App\Models\Pelanggaran;
use App\Models\UserDetail;
use Auth;
 


 class SubAdminController extends Controller{

 	function beranda(){
 		$data['user'] = Auth::user();
 		$data['jumlah_pondok'] = Pondok::count('id');
 		 $data['santri'] = Santri::count('id');
 		 $data['pelanggaran'] = Pelanggaran::count('id');
 		return view('subadmin.beranda', $data);
 	}

 }