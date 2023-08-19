<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model {
    use HasFactory;

    protected $guarded = ['id'];

    // Relasi (has many artinya 1 to many)
    public function posts() {
        return $this->hasMany( Post::class );
    }

    /**
     * Get the route key for the model.
     */
    public function getRouteKeyName() {
        return 'slug';
    }
}