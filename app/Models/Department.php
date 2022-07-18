<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    /**
     * One to many relationship
     *
     * @return void
     */
    public function cities()
    {
        return $this->hasMany(City::class);
    }

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
