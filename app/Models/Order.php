<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    const PENDING = 1;
    const RECEIVED = 2;
    const SENT = 3;
    const DELIVERED = 4;
    const CANCELLED = 5;

    protected $fillable = [
        'customer_id',
        'department_id',
        'city_id',
        'district_id',
        'shipping_cost',
        'total',
        'content',
        'name',
        'last_name',
        'email',
        'address',
        'optional_address',
        'optional_data',
        'phone'
    ];

    /**
     * One to many inverse relationship
     *
     * @return void
     */
    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    /**
     * One to many inverse relationship
     *
     * @return void
     */
    public function city()
    {
        return $this->belongsTo(City::class);
    }

    /**
     * One to many inverse relationship
     *
     * @return void
     */
    public function district()
    {
        return $this->belongsTo(District::class);
    }

    /**
     * One to many inverse relationship
     *
     * @return void
     */
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
