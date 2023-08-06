<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Remaja extends Model
{
    use HasFactory;
    protected $table = 'remajas';
    protected $primaryKey = 'id'; // Primary key column name
    public $incrementing = false; // Disable auto-incrementing
    protected $fillable = ['id','nik','nomorkk','nama', 'tanggallahir','pemeriksaan_anemia','tambahan_darah'];

    public function warga()
    {
        return $this->belongsTo(Warga::class);
    }
}


