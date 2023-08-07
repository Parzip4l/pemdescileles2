<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    use HasFactory;

    protected $fillable = ['subcategories'];

    public function category()
    {
        return $this->belongsTo(Urusansibangenan::class);
    }
}
