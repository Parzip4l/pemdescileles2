<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sibangenan extends Model
{
    use HasFactory;
    protected $table = 'sibangenan';
    protected $primaryKey = 'id'; // Primary key column name
    public $incrementing = false; // Disable auto-incrementing
    protected $keyType = 'string';
    protected $fillable = ['id','namapemohon','rw','permasalahan', 'urusan', 'usulan', 'lokasi', 'dokumen_pendukung','keterangan_penolakan'];
}
