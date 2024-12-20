<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class checkingtraining extends Model
{
    protected $fillable = [
        'user_id',
        'pelatihan_id',
        'zoom',
        'foto',
        'name',
        'email',
        'company_name',
        'no_phone',
    
    ];
    
    public function user():BelongsTo{
        return  $this->belongsTo(User::class);
    }
    public function pelatihan():BelongsTo{
        return  $this->belongsTo(Training::class);
    }
}
