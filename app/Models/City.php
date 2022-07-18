<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'cost', 'department_id'];

    /**
     * one to many relationship
     *
     * @return void
     */
    public function districts()
    {
        return $this->hasMany(District::class);
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
