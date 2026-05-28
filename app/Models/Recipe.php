<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Recipe extends Authenticatable
{

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function recipe_step()
    {
        return $this->hasMany(RecipeStep::class);
    }
    protected $fillable = [
        'name',
        'description',
        'cooktime',
        'difficulty',
        'photo',
    ];
}
