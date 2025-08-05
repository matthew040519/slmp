<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class photos extends Model
{
    //
    protected $table = 'photos';
    protected $primaryKey = 'id';

    protected $fillable = [
        'albumId',
        'title',
        'url',
        'thumbnailUrl',
    ];
}
