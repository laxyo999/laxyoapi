<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class page_categories extends Model
{
    protected $fillable = [
            'parent', 'title'
        ];
}
