<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TunjanganModel extends Model
{
    //
    protected $table = 'tunjangans';
    protected $fillable = array('kode_tunjangan','jabatan_id','golongan_id', 'status', 'jumlah_anak', 'besaran_uang');
    protected $visible = array('kode_tunjangan','jabatan_id','golongan_id', 'status', 'jumlah_anak', 'besaran_uang');

    public function jabatan()
    {
    	return $this->belongsTo('App\JabatanModel','jabatan_id');
    }

    public function golongan()
    {
    	return $this->belongsTo('App\GolonganModel','golongan_id');
    }

	public function tunjangan_pegawai()
    {
    	return $this->hasMany('App\TunjanganPegawaiModel','kode_tunjangan_id');
    }    
}
