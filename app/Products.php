<?php

namespace App;
use App\Model\Category;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $guarded =[];

    public function Images()
    {
        return $this->hasMany(Images::class);
    }

    public function Category()
    {
        return $this->belongsTo(Category::class);
    }
}
