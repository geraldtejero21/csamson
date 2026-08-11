<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_id', 'first_name', 'last_name', 'email', 'phone', 'birth_date',
        'appointment_date', 'appointment_time', 'reason', 'notes', 'status',
    ];

    protected $casts = [
        'birth_date' => 'date',
        'appointment_date' => 'date',
        'converted_at' => 'datetime',
    ];

    public function getPatientNameAttribute()
    {
        return trim($this->first_name . ' ' . $this->last_name);
    }
}
