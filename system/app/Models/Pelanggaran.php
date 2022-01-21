<?php

namespace App\Models;
use Carbon\Carbon;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Pelanggaran extends Model
{
	protected $table = 'pelanggaran';

	 public function getTglAttribute(){
        return Carbon::parse($this->attributes['tgl'])->translatedFormat('l, d F Y');
    }


}