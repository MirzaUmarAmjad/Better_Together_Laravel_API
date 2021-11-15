<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'eventDate',
        'address1',
        'address2',
        'city',
        'state',
        'zip',
        'user_id',
    ];
}
