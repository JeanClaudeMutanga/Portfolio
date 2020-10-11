<?php

namespace App\Model;
use App\User;
use App\Products;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = [];
    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function Products()
    {
        return $this->hasMany(Products::class);
    }
}
