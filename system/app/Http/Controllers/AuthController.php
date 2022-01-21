<?php 

namespace App\Http\Controllers;
use Auth;
use App\Models\Pondok;



class AuthController extends Controller{

	function login(){
		return view('login');
	}

	function prosesLogin(){
		if(Auth::guard('pondok')->attempt(['email' => request('email'), 'password' => request('password')])){
			return redirect('admin/beranda')-> with('success', 'Login Berhasil');
			}

			if(Auth::guard('pengajar')->attempt(['email' => request('email'), 'password' => request('password')])){
			return redirect('pengajar/beranda')-> with('success', 'Login Berhasil');
			}

			if(Auth::guard('orangtua')->attempt(['no_kk' => request('email'), 'password' => request('password')])){
			return redirect('orangtua/beranda')-> with('success', 'Login Berhasil, silahkan pantau perkembangan anak anda disini');
			}
			if(Auth::guard('subadmin')->attempt(['email' => request('email'), 'password' => request('password')])){
			return redirect('subadmin/beranda')-> with('success', 'Login Berhasil');
			}



			else{
				return back()-> with('danger', 'Silahkan cek email dan password anda');
				}
			}

	function Logout(){
		Auth::guard('pondok')->logout();
		Auth::guard('orangtua')->logout();
		Auth::guard('subadmin')->logout();
		Auth::guard('pengajar')->logout();
		Auth::logout();
		return redirect('login');
	}

	function Registrasi(){
			return view('signup');
 	}
 	function prosesRegis(){
 		$regis = new User;
 		$regis->nama = request('nama');
 		$regis->username = request('username');
 		$regis->email = request('email');
 		$regis->tmptlahir = request('tmptlahir');
 		$regis->tgllahir = request('tgllahir');
 		$regis->password = bcrypt(request('password'));
 		$regis->profil = request('gambar');
 		$regis->save();

 		return redirect('signup')->with('success', 'Data Berhasil ditambah');
 	}

	function Forgot(){
		
	}
}