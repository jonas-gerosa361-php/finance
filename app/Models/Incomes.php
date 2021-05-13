<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Incomes extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'name',
        'description',
        'value',
        'date',
        'paid'
    ];
    protected $table = 'incomes';
}
