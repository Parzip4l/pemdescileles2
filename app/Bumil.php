<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bumil extends Model
{
    use HasFactory;
    protected $table = 'bumils';
    protected $fillable = ['nik','nomorkk','nama', 'tanggallahir'];
}
