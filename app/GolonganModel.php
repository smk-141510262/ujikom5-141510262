<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GolonganModel extends Model
{
    //
    protected $table = 'golongans';
    protected $fillable = array('kode_golongan','nama_golongan','besaran_uang' );
    protected $visible = array('kode_golongan','nama_golongan','besaran_uang' );

    public function tunjangan()
    {
    	return $this->hasMany('App\TunjanganModel','golongan_id');
    }

    public function pegawai()
    {
    	return $this->hasMany('App\PegawaiModel','golongan_id');
    }

    public function kategori_lembur()
    {
    	return $this->hasMany('App\KategoriLemburModel','golongan_id');
    }
}
