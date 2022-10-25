<?php

namespace App\Models;

use App\Models\User;
use App\Models\Ville;
use App\Models\SousCategorie;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Annonces extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'id',
        'titre',
        'description',
        'contactWhatsapp',
        'prix',
        'type',
        'Lieu',
        'email',
        'photo',
        'slug',
        'facebook',
        'ville_id',
        'user_id',
        'souscategorie_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function villes()
    {
        return $this->belongsTo(Ville::class, 'ville_id');
    }

    public function souscat()
    {
        return $this->belongsTo(SousCategorie::class, 'souscategorie_id');
    }
}
