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
        'due_date',
        'repeatFor',
        'repeatedFor',
        'paid'
    ];
    protected $table = 'bills';

    public function getRepeatedForAttribute($value)
    {
        if ($value > 0) {
            return $value;
        }

        return 0;
    }
}
