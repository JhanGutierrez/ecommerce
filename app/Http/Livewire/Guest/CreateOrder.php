<?php

namespace App\Http\Livewire\Guest;

use App\Models\City;
use App\Models\Department;
use App\Models\District;
use App\Models\Order;
use Livewire\Component;

class CreateOrder extends Component
{
    public $name = '';
    public $lastName = '';
    public $email = '';
    public $address = '';
    public $optionalAddress = '';
    public $phone = '';
    public $optionalData = '';
    public $shippingCost = 0; //TODO: Calculate shipping cost


    public $departmentList = [];
    public $cityList = [];
    public $districtList = [];

    public $selectedDepartment = 0;
    public $selectedCity = 0;
    public $selectedDistrict = 0;

    protected $rules = [
        'name' => 'required',
        'lastName' => 'required',
        'email' => 'required|email',
        'address' => 'required',
        'selectedDepartment' => 'required|not_in:0',
        'selectedCity' => 'required|not_in:0',
        'selectedDistrict' => 'required|not_in:0',
    ];

    public function mount()
    {
        $this->departmentList = Department::all();
    }

    public function updatedSelectedDepartment()
    {
        $this->selectedCity = 0;
        $this->selectedDistrict = 0;
    }

    public function updatedSelectedCity()
    {
        $this->selectedDistrict = 0;
        $this->shippingCost = City::find($this->selectedCity)->cost;
    }

    public function createOrder()
    {
        $this->validate($this->rules);

        $order = new Order();
        $order->department_id = $this->selectedDepartment;
        $order->city_id = $this->selectedCity;
        $order->district_id = $this->selectedDistrict;
        $order->shipping_cost = $this->shippingCost;
        $order->total = $this->shippingCost + \Cart::getSubTotal();
        $order->content = \Cart::getContent();
        $order->name = $this->name;
        $order->last_name = $this->lastName;
        $order->email = $this->email;
        $order->address = $this->address;
        $order->optional_address = $this->optionalAddress;
        $order->optional_data = $this->optionalData;
        $order->phone = $this->phone;

        $order->save();
        /* \Cart::clear(); TODO:CLEAR CART WHEN COMPLETE PAYMENT */
        /* TODO:THE ORDER WIL DESTROYED IF AFTER 10 MINUTES USER NOT HVE BEEN PAYED */

        return redirect()->route('order.payment', $order);
    }

    public function render()
    {
        $this->cityList = City::where('department_id', $this->selectedDepartment)->get();
        $this->districtList = District::where('city_id', $this->selectedCity)->get();
        return view('livewire.guest.create-order')->layout('components.layouts.guest-basic-layout');
    }
}
