<?php

namespace App\Models;

use App\Models\City;
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
        'images_secondaire',
        'slug',
        'facebook',
        'ville_id',
        'user_id',
        'view_count_annonces',
        'souscategorie_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function villes()
    {
        return $this->belongsTo(City::class, 'ville_id');
    }

    public function souscat()
    {
        return $this->belongsTo(SousCategorie::class, 'souscategorie_id');
    }

    public function annonce_prenium(){
        return $this->hasMany(annonce_prenium::class ,'annonce_id');
    }
}
