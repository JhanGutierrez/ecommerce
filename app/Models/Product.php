<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    const STATUS_PENDING = 1;
    const STATUS_RELEASED = 2;

    protected $fillable = [
        'name',
        'slug',
        ' description',
        'price',
        'img_1',
        'img_2',
        'img_3',
        'img_4',
        'brand_id',
        'subcategory_id'
    ];

    /**
     * One to many inverse relation
     *
     * @return void
     */
    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }

    /**
     * One to many inverse relationship
     *
     * @return void
     */
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    /**
     * One to many relationship
     *
     * @return void
     */
    public function productEntries()
    {
        return $this->hasMany(ProductEntry::class);
    }
}
