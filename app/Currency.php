<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    protected $fillable = ['name','sort','symbol','x_rate','default'];
    public $timestamps = false;
}
