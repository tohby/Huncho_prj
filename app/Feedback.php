<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'feedback', 'product_id', 'user_id',
    ];

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function product() {
        return $this->belongsTo('App\Product');
    }
}
