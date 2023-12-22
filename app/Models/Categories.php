<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model {
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'parent_category_id',
        'image',
        'status',
    ];
    public function parentCategory() {
        return $this->belongsTo(Categories::class, 'parent_category_id');
    }
}
