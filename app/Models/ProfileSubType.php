<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProfileSubType extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'profile_id',
        'profile_sub_id',
        'name',
        'description',
        'status',
        'dashboard',
    ];

    protected $table = 'profile_subtypes';
}
