<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hospital extends Model
{
    
     protected $fillable = [
        'id',
        'user_id',
        'name',
        'email',
        'password',
        'services',
        'phone',
        'license_no',
        'address',
        'status',
        'city',
        'image'
    ];

     public function user()
    {
        return $this->belongsTo(User::class);
    }

public function testBookings()
{
    return $this->hasMany(TestBooking::class);
}

public function vaccinationBookings()
{
    return $this->hasMany(VaccinationBooking::class);
}




}
