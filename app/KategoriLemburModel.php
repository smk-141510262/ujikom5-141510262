<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KategoriLemburModel extends Model
{
    //
    protected $table = 'kategori_lemburs';
    protected $fillable = array('kode_lembur','jabatan_id','golongan_id','besaran_uang');
    protected $visible = array('kode_lembur','jabatan_id','golongan_id','besaran_uang');

    public function jabatan()
    {
    	return $this->belongsTo('App\JabatanModel','jabatan_id');
    }

    public function golongan()
    {
    	return $this->belongsTo('App\GolonganModel','golongan_id');
    }

	public function lembur_pegawai()
    {
    	return $this->hasMany('App\LemburPegawai','kode_lembur_id');
    }    
}
