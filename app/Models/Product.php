<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'price', 'img_url', 'supermarket_id', 'category_id', 'measure'];

    public $timestamps = false;

    public function supermarket(): BelongsTo
    {
        return $this->belongsTo(Supermarket::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
