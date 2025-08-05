<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class todos extends Model
{
    //
    protected $table = 'todos';
    protected $primaryKey = 'id';

    protected $fillable = [
        'iUserId',
        'title',
        'completed',
    ];

}
