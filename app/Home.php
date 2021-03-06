<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Home extends Model
{
    use SoftDeletes;

    protected $table = 'crud';

    protected $fillable = [
        'max32', 'max65535',
    ];
}
