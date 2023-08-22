<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserActivity extends Model
{
    use HasFactory;
    protected $table = 'user_activity';

    protected $fillable = [
        'action',
        'model',
        'user_id',
        'user_name',
        'old_values',
        'new_values'
    ];
}
