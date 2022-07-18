<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'category_id'
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * One to many inverse relationship
     *
     * @return void
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * One to many relationship
     *
     * @return void
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    /**
     * Many to many relationship
     *
     * @return void
     */
    public function brands()
    {
        return $this->belongsToMany(Brand::class);
    }
}
