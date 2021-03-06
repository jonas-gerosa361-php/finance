<?php

namespace App\Models;

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
        'paid',
        'pay_date',
        'credit_card',
        'categories_id'
    ];
    protected $table = 'bills';

    public function getRepeatedForAttribute($value)
    {
        if ($value > 0) {
            return $value;
        }

        return 0;
    }

    public function categories()
    {
        return $this->belongsTo(Categories::class);
    }
}
