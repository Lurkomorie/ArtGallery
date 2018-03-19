<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'name', 'city', 'country', 'date','description'
    ];
    //

    protected $hidden = [
        'id','removed'
    ];
}
