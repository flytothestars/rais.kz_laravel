<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class history extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_user', 'id_post_first', 'count', 'is_active', 'time_start', 'id_post_second', 'time_end'
    ];
}
