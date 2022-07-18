<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    /**
     * One to many relationship
     *
     * @return void
     */
    public function productEntries()
    {
        return $this->hasMany(productEntry::class);
    }
}
