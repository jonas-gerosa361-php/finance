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
        'paid',
        'account_id'
    ];
    protected $table = 'incomes';
}
