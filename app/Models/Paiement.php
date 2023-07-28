<?php

namespace App\Models;

use App\Models\Abonnement;
use App\Models\annonce_prenium;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Paiement extends Model
{
    use HasFactory;

    
    protected $fillable = [
        'id',
        'details',
        'slug',
        'created_at',
        'updated_at',
        'abonnement_id',
    ];

    public function abonnement()
    {
        return $this->belongsTo(Abonnement::class, 'abonnement_id');
    }

    public function annonce_pre(){
        return $this->hasOne(annonce_prenium::class );
    }
}
