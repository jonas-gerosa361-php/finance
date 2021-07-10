<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Accounts extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'name',
        'balance'
    ];
    protected $table = 'accounts';
}
