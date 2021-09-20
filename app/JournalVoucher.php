<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JournalVoucher extends Model
{
    protected $fillable = ['journal_no','date','project_id','narration','total'];
    public $timestamps = false;

}
