<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengurus extends Model
{
    use HasFactory;
    protected $table = 'pengurus';
    protected $primaryKey = 'id'; // Primary key column name
    public $incrementing = false; // Disable auto-incrementing
    protected $keyType = 'string';
    protected $fillable = ['id','nama','jabatan','jk','nip', 'tanggal_lahir', 'tempat_lahir','foto','status_perkawinan'];
}
