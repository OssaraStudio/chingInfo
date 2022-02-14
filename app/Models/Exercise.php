<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
    use HasFactory;

    public function module()
    {
        return $this->belongsTo(Module::class);
    }

    public function solution()
    {
        return $this->hasOne(Solution::class);
    }
}
