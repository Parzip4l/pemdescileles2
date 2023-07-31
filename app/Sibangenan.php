<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sibangenan extends Model
{
    use HasFactory;
    protected $table = 'sibangenan';
    protected $fillable = ['namapemohon','rw','permasalahan', 'urusan', 'usulan', 'lokasi', 'dokumen_pendukung'];
}
