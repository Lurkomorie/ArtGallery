<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Drawing extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'city', 'country','date','genre','technology','size','status','price'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'id','removed','redacted'
    ];
}
