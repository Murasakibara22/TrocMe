<?php

namespace App\Models;

use App\Models\Pays;
use App\Models\Annonces;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ville extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'libelle',
        'code',
        'slug',
        'created_at',
        'updated_at',
        'pays_id'
    ];

    public function pay(){
        return $this->belongsTo(Pays::class, 'pays_id');
    }

    public function annonce(){
        return $this->hasMany(Annonces::class, 'ville_id')->get();
    }
}
