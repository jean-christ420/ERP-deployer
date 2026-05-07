<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'demande_id',
        'description',
        'quantite',
        'prix',
        'total'
    ];

    public function demande()
    {
        return $this->belongsTo(Demande::class);
    }
}