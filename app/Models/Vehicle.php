<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vehicle extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'vehicle_type_id',
        'member_id',
        'license_plate',
        'notes',
    ];

    protected $dates = ['deleted_at'];

    public function vehicleType()
    {
        return $this->belongsTo(VehicleType::class);
    }

    public function member()
    {
        return $this->belongsTo(Member::class);
    }
}