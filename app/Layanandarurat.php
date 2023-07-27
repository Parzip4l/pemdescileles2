<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Layanandarurat extends Model
{
    use HasFactory;
    protected $table = 'layanandarurat';
    protected $fillable = ['namalayanan','nomorlayanan'];
}
