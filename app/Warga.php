<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warga extends Model
{
    use HasFactory;
    protected $table = 'warga';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = ['id','nik','nokk','nama','hubungankk','rt','rw','jk','agama','pendidikan','pekerjaan','tanggal_lahir','tempat_lahir','statusperkawinan','nama_ayah','nama_ibu'];
}
