<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    protected $fillable = ['pur_invoice','payable','balance','paid','purchase_date','next_date','product_store','ref','created_by','project_id','note','lc_no','pi_no','lc_value','lc_date','pi_date','lc_bank'];
}
