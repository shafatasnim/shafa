<?php 

namespace App\Http\Controllers;


 class BerandaController extends Controller{

 	
    //beranda subadmin
    function berandaSubAdmin(){
      
        return view('subadmin.beranda');
    }


    //beranda admin
    function berandaAdmin(){
 		return view('admin.beranda');
 	}


 //beranda orangtua
    function berandaOrtu(){
        return view('wali.beranda');
    }

 }

