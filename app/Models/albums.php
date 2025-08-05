<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class albums extends Model
{
    //
    protected $table = 'albums';
    protected $primaryKey = 'id';

    protected $fillable = [
        'title',
    ];
}
