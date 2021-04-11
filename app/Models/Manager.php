<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Manager extends Authenticatable
{
    use Notifiable;

    protected $hidden = [
        'password'
    ];

    protected $table = 'managers';

    protected $primaryKey = 'id';

    public $timestamps = true;
}
