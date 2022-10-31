<?php

namespace App\Models\Admin\Appointment;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppointmentModel extends Model
{
    use HasFactory;
    protected $table = 'appointment'; 
    protected $primaryKey = 'appointment_id';
    protected $fillable = ['appointment_time', 'appointment_pin'];
}
