<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ParkingData extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'license_plate',
        'vehicle_id',
        'employee_id',
        'hourly_rates_id',
        'datetime_in',
        'datetime_out',
        'amount_to_pay',
    ];

    protected $dates = ['deleted_at'];

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function hourlyRate()
    {
        return $this->belongsTo(HourlyRate::class);
    }
}