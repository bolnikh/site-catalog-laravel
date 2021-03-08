<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Abuse extends Model
{
    use HasFactory;

    protected $fillable = [
        'site_id',
        'contact',
        'email',
        'message',
    ];
}
