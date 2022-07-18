<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductEntry extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'size_id',
        'color_id',
        'quantity'
    ];

    /**
     * One to many inverse relationship
     *
     * @return void
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * One to many inverse relationship
     *
     * @return void
     */
    public function color()
    {
        return $this->belongsTo(Color::class);
    }

    /**
     * One to many inverse relationship
     *
     * @return void
     */
    public function size()
    {
        return $this->belongsTo(Size::class);
    }
}
