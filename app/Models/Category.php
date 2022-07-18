<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug'
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * One to many relationship
     *
     * @return void
     */
    public function subcategories()
    {
        return $this->hasMany(Subcategory::class);
    }
}
