<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class User extends Model
{
    use HasFactory,Notifiable;

    protected $fillable = [
        'name',
        'last_name',
        'code',
        'status',
        'dni',
        'province',
        'date_birth',
        'email',
        'observation',
        'date_start',
        'role',
        'department',
        'province_work',
        'salary',
        'part_time',
        'observation_work',
        'image'
    ];

}
