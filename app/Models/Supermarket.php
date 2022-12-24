<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supermarket extends Model
{
    use HasFactory;

    protected $fillable = ['address', 'phone'];

    public $timestamps = false;

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
