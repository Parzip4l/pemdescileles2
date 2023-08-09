<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InformasiPublik extends Model
{
    use HasFactory;
    protected $table = 'informasipublik';
    protected $primaryKey = 'id'; // Primary key column name
    public $incrementing = false; // Disable auto-incrementing
    protected $keyType = 'string';
    protected $fillable = ['id','judul','file'];
}
