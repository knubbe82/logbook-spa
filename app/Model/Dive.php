<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Dive extends Model
{
    protected $guarded = [];

    protected $dates = ['time'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
