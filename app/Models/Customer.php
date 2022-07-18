<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    /**
     * One to many relationship
     *
     * @return void
     */
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
