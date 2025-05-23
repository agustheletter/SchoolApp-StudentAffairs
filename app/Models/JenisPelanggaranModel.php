<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JenisPelanggaranModel extends Model
{
    use HasFactory;
    protected $table        = "tbl_jenis_pelanggaran";
    protected $primaryKey   = 'idjenispelanggaran';
    protected $keyType      = 'string';
    public $incrementing    = false;
    protected $fillable     = ['idjenispelanggaran','nama', 'tingkat','deskripsi'];

    public function siswapelanggaran()
    {
        return $this->hasMany('App\Models\SiswaPelanggaran','idjenispelanggaran');
    }
}
