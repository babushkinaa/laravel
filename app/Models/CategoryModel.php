<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryModel extends Model
{
    //
    public function image()
    {
        return $this->hasOne('App\Models\ImageModel');
    }
}
