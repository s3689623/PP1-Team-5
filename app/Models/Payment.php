<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = 'payments';
    protected $primaryKey='id';
    public $timestamps = true;
    protected $guarded=[];

    public function order()
    {
        return $this->belongsTo('App\Models\Order');
    }
}
