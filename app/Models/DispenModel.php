<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DispenModel extends Model
{
    use HasFactory;
    protected $table        = "tbl_dispen";
    protected $primaryKey   = 'iddispen';
    protected $keyType      = 'int';
    public $incrementing    = true;
    protected $fillable     = ['iddispen','namadispen','waktumulai','waktuselesai','idguru'];

    public function guru()
    {
        return $this->belongsTo('App\Models\GuruModel','idguru');
    }

    public function dispendetails()
    {
        return $this->hasMany(DispenDetailModel::class, 'iddispen');
    }

     public function siswa()
    {
        return $this->belongsToMany(SiswaModel::class, 'tbl_dispendetail', 'iddispen', 'idsiswa');
    }
}
