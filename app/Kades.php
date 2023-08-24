<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kades extends Model
{
    use HasFactory;
    protected $table = 'sejarah_kepemimpinan';
    protected $primaryKey = 'id'; // Primary key column name
    public $incrementing = false; // Disable auto-incrementing
    protected $keyType = 'string';
    protected $fillable = ['id','nama','dari_tahun','sampai_tahun','pemimpin_sekarang'];
}
