<?php

namespace App\Models;

use App\Models\Pays;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ville extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'libelle',
        'code',
        'created_at',
        'updated_at',
        'pays_id'
    ];

    public function pays(){
        return $this->belongsTo(Pays::class, 'pays_id');
    }
}
