<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Urusansibangenan extends Model
{
    use HasFactory;
    protected $table = 'urusansibangenan';
    protected $primaryKey = 'id'; // Primary key column name
    public $incrementing = false; // Disable auto-incrementing
    protected $keyType = 'string';
    protected $fillable = ['id','nama','keterangan'];

    public function subcategories()
    {
        return $this->hasMany(Subcategory::class);
    }
}
