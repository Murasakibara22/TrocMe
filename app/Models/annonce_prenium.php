<?php

namespace App\Models;

use App\Models\Annonces;
use App\Models\Paiement;
use App\Models\Following;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class annonce_prenium extends Model
{
    use HasFactory;

    protected $fillable = [ 
        'prix',
        'etat',
        'date_debut',
        'date_fin',
        'slug',
        'annonce_id',
        'following_id',
    ];

    public function annonce(){
        return $this->belongsTo(Annonces::class ,'annonce_id');
    }

    public function follow(){
        return $this->belongsTo(Following::class ,'following_id');
    }

    public function paiement(){
        return $this->hasOne(Paiement::class );
    }
}
