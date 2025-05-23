<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SiswaPelanggaran extends Model
{
    use HasFactory;
    protected $table        = "tbl_siswapelanggaran";
    protected $primaryKey   = 'idpelanggaran';
    protected $keyType      = 'string';
    public $incrementing    = false;
    protected $fillable     = ['idpelanggaran','idsiswa', 'idjenispelanggaran','keterangan','photobukti','tanggal'];

    public function siswa()
    {
        return $this->belongsTo('App\Models\SiswaModel','idsiswa');
    }

    public function jenispelanggaran()
    {
        return $this->belongsTo('App\Models\JenisPelanggaranModel','idjenispelanggaran');
    }
}
