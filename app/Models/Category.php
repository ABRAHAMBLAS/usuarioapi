<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table="category";

      protected $fillable = [
        'name'
    ];

    public function category(){
        return $this->belongTo(Category::class);
    }
}
