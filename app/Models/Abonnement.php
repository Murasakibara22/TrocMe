<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Abonnement extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'type',
        'debut',
        'fin',
        'prix',
        'status',
        'created_at',
        'updated_at',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
