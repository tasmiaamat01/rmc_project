<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = ['dept_id','desg_id','name','fname','mobile','email','mname','phone','nidno','dob','join_date','salary','status','wbrid','item','address','paddress','created_by'];
    public $timestam = false;
}
