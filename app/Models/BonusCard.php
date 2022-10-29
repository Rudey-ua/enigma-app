<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BonusCard extends Model
{
    use HasFactory;

    const UPDATED_AT = null;
    
    protected $fillable = ['user_id', 'balance', 'created_at', 'updated_at'];
}
