<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Product extends Model
{
    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($product) {
            $product->slug = str_slug($product->name);
        });
    }
}
