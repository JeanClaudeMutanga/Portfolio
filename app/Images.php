<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    public function Products()
    {
        return $this->belongsTo(Products::class);
    }
}
