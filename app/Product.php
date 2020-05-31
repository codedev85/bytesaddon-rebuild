<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Validator;

class Product extends Model
{
    //

    public function category(){

        return $this->belongsTo(Category::class);
    }
}
