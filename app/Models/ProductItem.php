<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class ProductItem extends Model {
    use HasFactory;
    protected $fillable = [
        'product_id',
        'price',
        'quantity',
        'image',
        'stock'
    ];

    public function product() {
        return $this->belongsTo(Product::class);
    }
    public function variationOptions() {
        return $this->BelongsToMany(VariationOption::class, 'product_configurations', 'product_item_id', 'variation_option_id');
    }
    public function productConfigurations() {
        return $this->hasMany(ProductConfiguration::class);
    }
}
