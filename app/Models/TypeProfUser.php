<?php

namespace App\Models;

use App\Models\ProfessionalUser;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TypeProfUser extends Model
{
    use HasFactory;

    protected $fillable = [ 
        'titre',
        'description',
        'prix',
        'nb_jours',
        'slug',
    ];

    public function professional_user(){
        return $this->hasMany(ProfessionalUser::class);
    }
}
