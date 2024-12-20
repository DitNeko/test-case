<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class rate extends Model
{
    protected  $fillable = [
       
        'rating',
        'comments',
        'date',
        'user_id'
    ];
    public function user():BelongsTo{
        return  $this->belongsTo(User::class);
    }
    
}
