<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expensehead extends Model
{
    protected $fillable = ['name','e_type','description'];
    public $timestam = false;
}
