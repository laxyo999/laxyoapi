<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PageCategory extends Model
{
    protected $fillable = ['user_id','parent', 'title', 'slug'];
}
