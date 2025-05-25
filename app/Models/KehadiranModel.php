<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KehadiranModel extends Model
{
    use HasFactory;
    protected $table        = 'tbl_kehadiran';
    protected $primaryKey   = 'idkehadiran';
    protected $keyType      = 'int';
    public $incrementing    = true;
    protected $fillable     = ['jeniskehadiran', 'keterangan','idsiswa','hari','tanggal'];

    public function siswa()
    {
        return $this->belongsTo('App\Models\SiswaModel','idsiswa');
    }
}
