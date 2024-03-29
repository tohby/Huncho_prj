<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'orderCode', 'status', 'user_id', 'product_id',
    ];

    public function product()
    {
        return $this->belongsTo('App\Product');
    }
}
