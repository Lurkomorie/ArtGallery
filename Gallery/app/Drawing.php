<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Drawing extends Model
{
    /*public $artistId, $picture, $name, $city, $country, $date, $genre, $technology, $size, $status, $price;*/
    use Sortable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'artistId','picture','removed','redacted','title', 'city', 'country',
        'date','genre','technology','size','status','price'
    ];

    public $sortable = ['title','created_at','price','date'];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

    ];
}
