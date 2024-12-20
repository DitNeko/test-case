<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    use HasFactory;
    protected $fillable = [
        'poto',
        'title',
        'sub',
        'status',
        'price',
        'quota',
        'cource',
        'date',
        'deskripsi',
        'pemateri',
        'zoom',
    ];
    public function checkingtraining(): HasMany {
        return $this->hasMany(checkingtraining::class);
    }
}
