<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model {
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'parent_category_id',
        'image',
        'status',
    ];
    public function parentCategory() {
        return $this->belongsTo(Category::class, 'parent_category_id');
    }
    public function variations() {
        return $this->hasMany(Variation::class);
    }
}
