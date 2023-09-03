<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bumil extends Model
{
    use HasFactory;
    protected $table = 'bumils';
    protected $fillable = ['nik','nomorkk','nama','usia','tanggal_lahir'];

    public function warga()
    {
        return $this->belongsTo(Warga::class);
    }
}
