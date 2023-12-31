<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartProductItem extends Model {
    use HasFactory;
    protected $fillable = [
        'product_item_id',
        'quantity',
        'user_id',
    ];

    public function productItem() {
        return $this->belongsTo(ProductItem::class);
    }
}
