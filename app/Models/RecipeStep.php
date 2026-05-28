<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RecipeStep extends Model
{
    protected $fillable = [
        'stepnumber',
        'description',
        'image',
    ];
    public function recipe()
    {
        return $this->belongsTo(Recipe::class);
    }
}
