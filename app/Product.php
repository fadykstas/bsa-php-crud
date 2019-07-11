<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'my_products';
    protected $primaryKey = 'id';
    protected $attributes = [
        'available' => false,
    ];

    protected $fillable = ['name','price','seller_id'];
    protected $guarded = ['available',];

    public function seller(){
        return $this->belongsTo(Seller::class);
    }
}
