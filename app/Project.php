<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = ['pgid','pgsid','project_id','name','address','cperson','prjdetails','prjamount','prjexamount','prjtype','coid','coamount','client','status','brid','uid'];
    public $timestamps = false;
    public function group()
    {
    	return $this->belongsTo(Progroup::class,'pgid','id');
    }
    public function subgroup()
    {
    	return $this->belongsTo(Prosubgroup::class,'pgsid','id');
    }
    public function type()
    {
    	return $this->belongsTo(Protype::class,'prjtype','id');
    }
    public function contructor()
    {
    	return $this->belongsTo(Procontructor::class,'coid','id');
    }
    public function customer()
    {
    	return $this->belongsTo(Customer::class,'client','id');
    }

}
