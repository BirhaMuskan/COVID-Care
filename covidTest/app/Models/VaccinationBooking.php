<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class VaccinationBooking extends Model
{
    use HasFactory;

     protected $fillable = [
            'dose_no',
            'vaccine_type',
            'preferred_date',
            'time_slot',
            'medical_notes',
            'user_id',
            'hospital_id',
    ];

    

    protected $table = 'vaccination_bookings';

    public function hospital()
    {
        return $this->belongsTo(Hospital::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
