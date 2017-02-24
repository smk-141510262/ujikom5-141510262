<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LemburPegawaiModel extends Model
{
    //
    protected $table = 'lembur_pegawais';
    protected $fillable = array('kode_lembur_id','pegawai_id','jumlah_jam');
    protected $visible = array('kode_lembur_id','pegawai_id','jumlah_jam');

    public function kategori_lembur()
    {
    	return $this->belongsTo('App\KategoriLemburModel','kode_lembur_id');
    }

    public function pegawai()
    {
    	return $this->belongsTo('App\PegawaiModel','pegawai_id');
    }
}
