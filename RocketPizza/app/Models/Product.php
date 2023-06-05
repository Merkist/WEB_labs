<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function ingredients() {
        return $this->belongsToMany('App\Models\Ingredient');
    }

    public function orders() {
        return $this->belongsToMany('App\Models\Order')->withPivot('quantity');
    }
}
