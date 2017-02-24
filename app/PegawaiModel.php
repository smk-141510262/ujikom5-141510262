<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PegawaiModel extends Model
{
    //
    protected $table = 'pegawais';
    protected $fillable = array('nip','user_id','jabatan_id', 'golongan_id', 'photo');
    protected $visible = array('nip','user_id','jabatan_id', 'golongan_id', 'photo');

    public function jabatan()
    {
    	return $this->belongsTo('App\JabatanModel','jabatan_id'); }

    public function golongan()
    {
    	return $this->belongsTo('App\GolonganModel','golongan_id');
    }

    public function tunjangan_pegawai()
    {
    	return $this->hasOne('App\TunjanganPegawaiModel','pegawai_id');
    }

    public function lembur_pegawai()
    {
    	return $this->hasMany('App\LemburPegawai','pegawai_id');
    }
    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }
}
