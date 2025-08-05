<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class comments extends Model
{
    //
    protected $table = 'comments';
    protected $primaryKey = 'id';

    protected $fillable = [
        'postId',
        'name',
        'email',
        'body',
    ];
}
