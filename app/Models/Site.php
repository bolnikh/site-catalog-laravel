<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    use HasFactory;

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function url() {
        return '/site/'.$this->id;
    }

    public function abuse_url() {
        return '/abuse/'.$this->id;
    }
}
