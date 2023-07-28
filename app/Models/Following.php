<?php

namespace App\Models;

use App\Models\annonce_prenium;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Following extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'titre',
        'nb_jours',
        'prix',
        'description',
        'avantage1',
        'avantage2',
        'avantage3',
        'slug',
    ];

    public function annonce_prenium(){
        return $this->hasMany(annonce_prenium::class );
    }
}
