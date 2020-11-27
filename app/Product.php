<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Product extends Model
{
    use Searchable;

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

    public function user() {
        return $this->belongsTo('App\User');
    }

    /**
     * Get the indexable data array for the model.
     *
     * @return array
     */
    public function toSearchableArray()
    {
        $array = $this->toArray();

        // Customize array...

        return $array;
    }
}
