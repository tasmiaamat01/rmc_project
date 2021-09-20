<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = ['dept_name','description','created_by'];
    public $timestamps = false;
}
