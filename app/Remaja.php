<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Remaja extends Model
{
    use HasFactory;
    protected $table = 'remajas';
    protected $fillable = ['nik','nomorkk','nama', 'tanggallahir'];
}
