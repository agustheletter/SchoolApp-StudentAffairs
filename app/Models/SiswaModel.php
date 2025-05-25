<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiswaModel extends Model
{
    use HasFactory;
    protected $table        = "tbl_siswa";
    protected $primaryKey   = 'idsiswa';
    protected $keyType      = 'string';
    public $incrementing    = false;
    protected $fillable     = ['idsiswa','nis', 'nisn','namasiswa','tempatlahir','tgllahir','jk','alamat','idagama','tlprumah','hpsiswa','photosiswa','idthnajaran'];

    public function agama()
    {
        return $this->belongsTo('App\Models\AgamaModel','idagama');
    }

    public function thnajaran()
    {
        return $this->belongsTo('App\Models\TahunAjaranModel','idthnajaran');
    }

    public function siswakelas()
    {
        return $this->hasMany('App\Models\SiswaKelasModel','idsiswa');
    }

    public function siswapelanggaran()
    {
        return $this->hasMany('App\Models\SiswaPelanggaran','idsiswa');
    }

    public function dispendetail(){
        return $this->hasMany('App\Models\DispenDetailModel','idsiswa');
    }

    public function kehadiran(){
        return $this->hasMany('App\Models\kehadiranModel','idsiswa');
    }

    public function bayar()
    {
        return $this->hasMany('App\Models\BayarModel','idsiswa');
    }

    // public function jenisbayardetail()
    // {
    //     return $this->hasMany('App\Models\JenisBayarDetailModel','idthnajaran');
    // }
}
