<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

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
    public function subcategories()
    {
        return $this->belongsToMany(Subcategory::class);
    }
}
