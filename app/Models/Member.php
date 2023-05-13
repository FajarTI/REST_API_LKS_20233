<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Member extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'membership_id',
        'name',
        'email',
        'phone_number',
        'address',
        'date_of_birth',
        'gender',
    ];

    protected $dates = ['deleted_at'];

    public function membership()
    {
        return $this->belongsTo(Membership::class);
    }
}