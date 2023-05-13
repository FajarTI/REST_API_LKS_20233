<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HourlyRate extends Model
{
    use SoftDeletes;

    protected $table = 'hourly_rates';

    protected $fillable = ['membership_id', 'vehicle_type_id', 'value'];

    public function membership()
    {
        return $this->belongsTo(Membership::class);
    }

    public function vehicleType()
    {
        return $this->belongsTo(VehicleType::class);
    }
}