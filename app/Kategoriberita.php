<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategoriberita extends Model
{
    use HasFactory;
    protected $table = 'kategoriberita';
    protected $fillable = ['kategori','deskripsi'];
}
