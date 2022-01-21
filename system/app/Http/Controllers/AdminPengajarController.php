<?php 

namespace App\Http\Controllers;
use App\Models\Pengajar;
use Auth;
use App\Models\UserDetail;



class AdminPengajarController extends Controller{

    function index(){
        $data['user'] = Auth::user();
        $data['list_pengajar'] = Pengajar::all();
        return view('admin.pengajar.index', $data);

    }


    function store(){
        $pengajar = new Pengajar;
        $pengajar->id_pondok = Auth::id();
        $pengajar->nama_pengajar = request('nama_pengajar');
        $pengajar->nama_majelis = request('nama_majelis');
        $pengajar->jenis_majelis = request('jenis_majelis');
        $pengajar->alamat = request('alamat');
        $pengajar->no_hp = request('no_hp');
        $pengajar->email = request('email');
        $pengajar->password = bcrypt('123');
        $pengajar->handleUploadFoto();
        $pengajar->save();
        return back()->withInput()->with('success','Data Berhasil Ditambahkan');

    }
    

    function update(Pengajar $pengajar){

        $pengajar->nama_pengajar = request('nama_pengajar');
        $pengajar->nama_majelis = request('nama_majelis');
        $pengajar->jenis_majelis = request('jenis_majelis');
        $pengajar->alamat = request('alamat');
        $pengajar->no_hp = request('no_hp');
        $pengajar->email = request('email');
        $pengajar->password = bcrypt('123');
        $pengajar->handleUploadFoto();
        $pengajar->save();
        return redirect('admin/pengajar')->with('success', 'Data Berhasil Diubah');

    }


    function show(Pengajar $pengajar){
        $data['user'] = Auth::user();
        $data['pengajar'] = $pengajar;
        return view('admin.pengajar.show',$data);

    }


    function destroy(Pengajar $pengajar){
        $pengajar->delete();
        return redirect('admin/pengajar')->with('succes', 'Data Berhasil Dihapus');
    }
    
}