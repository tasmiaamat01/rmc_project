<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Procontructor extends Model
{
    protected $fillable = ['code','name','mobile','email','address','note','status','brid','uid'];
    public $timestamps = false;
}
