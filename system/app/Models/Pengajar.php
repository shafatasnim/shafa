<?php

namespace App\Models;


use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Str;
use Laravel\Sanctum\HasApiTokens;

class Pengajar extends Authenticatable
{
	protected $table = 'pengajar';

	function handleUploadFoto(){
		if(request()->hasFile('foto')){
			$this->handleDeleteFoto();
			$foto = request()->file('foto');
			$destination = "images/pengajar";
			$randomStr = Str::random(5);
			$filename = $this->id."-".time()."-".$randomStr.".".$foto->extension();
			$url = $foto->storeAs($destination, $filename);
			$this->foto = "app/".$url;
			$this->save;
		}
	}
	function handleDeleteFoto(){
		$foto= $this->foto;
		if($foto){
			$path = public_path($foto);
			if(file_exists($path)){
				unlink($path);

			}
			return true;
		}
	}

}