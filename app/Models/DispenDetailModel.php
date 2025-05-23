<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DispenDetailModel extends Model
{
    use HasFactory;
    protected $table        = "tbl_dispendetail";
    protected $primaryKey   = 'iddispendetail';
    protected $keyType      = 'string';
    public $incrementing    = false;
    protected $fillable     = ['iddispendetail','iddispen','idsiswa'];

    public function dispen()
    {
        return $this->belongsTo('App\Models\DispenModel','iddispen');
    }

    public function siswa()
    {
        return $this->belongsTo('App\Models\SiswaModel','idsiswa');
    }
}
