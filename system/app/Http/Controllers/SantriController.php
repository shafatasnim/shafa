<?php 

namespace App\Http\Controllers;
use App\Models\Santri;
use App\Models\UserDetail;
 


 class SantriController extends Controller{

    function index(){
        $data['list_santri'] = Santri::all();
        return view('admin.santri.index', $data);

    }


    function store(){
        $pondok = new Santri;
        $pondok->nama_pondok = request('nama_pondok');
        $pondok->nama_admin_pondok = request('nama_admin_pondok');
        $pondok->alamat = request('alamat');
        $pondok->no_hp = request('no_hp');
        $pondok->email = request('email');
        $pondok->password = bcrypt(request('no_hp'));
        $pondok->handleUploadFoto();
        $pondok->visi = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. In laoreet tincidunt sapien, nec volutpat sapien mattis non. Sed rhoncus nunc in massa malesuada ornare. Nam id velit et lacus fringilla ullamcorper. Aenean luctus euismod enim vel condimentum. Donec fermentum, lectus at bibendum mattis, quam lectus gravida arcu, a sodales sem ante in arcu. Integer varius metus vitae mollis lobortis. Nam libero dui, ultrices in purus ut, accumsan efficitur leo.";
        
        $pondok->misi = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. In laoreet tincidunt sapien, nec volutpat sapien mattis non. Sed rhoncus nunc in massa malesuada ornare. Nam id velit et lacus fringilla ullamcorper. Aenean luctus euismod enim vel condimentum. Donec fermentum, lectus at bibendum mattis, quam lectus gravida arcu, a sodales sem ante in arcu. Integer varius metus vitae mollis lobortis. Nam libero dui, ultrices in purus ut, accumsan efficitur leo.";
        $pondok->save();
        return back()->withInput()->with('success','Data Berhasil Ditambahkan');

    }
    
    function destroy(Santri $santri){
        $pondok->handleDeleteFoto();
        $pondok->delete();
        return redirect('subadmin/pondok')->with('pondok', 'Data Berhasil dihapus');
    }

    function update(Santri $santri){
        $pondok->nama_pondok = request('nama_pondok');
        $pondok->nama_admin_pondok = request('nama_admin_pondok');
        $pondok->alamat = request('alamat');
        $pondok->no_hp = request('no_hp');
        $pondok->email = request('email');
        $pondok->password = bcrypt(request('no_hp'));
        $pondok->handleUploadFoto();
        $pondok->save();
        return back()->withInput()->with('success','Data Berhasil Ditambahkan');

    }









    
}