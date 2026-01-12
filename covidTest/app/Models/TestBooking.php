<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class TestBooking extends Model
{
    use HasFactory;

      protected $fillable = [
           'test_type',
           'preferred_date',
           'time_slot',
           'sample_type',
           'symptoms',
           'notes',
           'user_id',
           'hospital_id',
           'status',
           'result',
           'report_date',
           'doctor_notes',
    ];


    protected $table = 'test_bookings';

    public function hospital()
    {
        return $this->belongsTo(Hospital::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
