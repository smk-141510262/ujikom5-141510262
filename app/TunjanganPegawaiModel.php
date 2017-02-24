<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TunjanganPegawaiModel extends Model
{
    //
    protected $table = 'tunjangan_pegawais';
    protected $fillable = array('kode_tunjangan_id','pegawai_id');
    protected $visible = array('kode_tunjangan_id','pegawai_id');

    public function tunjangan()
    {
    	return $this->belongsTo('App\TunjanganModel','kode_tunjangan_id');
    }

    public function pegawai()
    {
    	return $this->belongsTo('App\PegawaiModel','pegawai_id');
    }

	public function penggajian()
    {
    	return $this->hasMany('App\PenggajianModel','tunjangan_pegawai_id');
    }    
}
