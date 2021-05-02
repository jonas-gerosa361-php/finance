<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bills extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'name',
        'value',
        'due-date',
        'repeatFor',
        'repeatedFor'
    ];
    protected $table = 'bills';
}
