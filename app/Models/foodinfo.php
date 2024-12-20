<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

use Illuminate\Database\Eloquent\Model;

class foodinfo extends Model
{
    protected $fillable = [
        'user_id',
        'schedule',
        'company',
        'fruit',
        'food',
        'drink',
        'snack',
        'status',
    
    ];


    public function user():BelongsTo{
        return  $this->belongsTo(User::class);
    }
    

    
            
}
