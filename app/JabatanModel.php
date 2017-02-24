<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JabatanModel extends Model
{
    //
    protected $table = 'jabatans';
    protected $fillable = array('kode_jabatan','nama_jabatan','besaran_uang');
    protected $visible = array('kode_jabatan','nama_jabatan','besaran_uang');

    public function tunjangan()
    {
    	return $this->hasMany('App\TunjanganModel','jabatan_id');
    }

	public function pegawai()
    {
    	return $this->hasMany('App\PegawaiModel','jabatan_id');
    }

	public function kategori_lembur()
    {
    	return $this->hasMany('App\KategoriLemburModel','jabatan_id');
    }        
}
