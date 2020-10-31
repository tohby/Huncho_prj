<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'desc', 'color', 'transmission', 'engine', 'price', 'brand_id', 'image',
    ];

    public function brand()
    {
        return $this->belongsTo('App\Brand');
    }
}
