<?php

namespace App\Models;

use App\Models\User;
use App\Models\TypeProfUser;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProfessionalUser extends Model
{
    use HasFactory;
    protected $fillable = [ 
        'prix',
        'etat',
        'date_debut',
        'date_fin',
        'type_prof_user_id',
        'user_id',
        'slug',
    ];


    public function type_prof_user(){
        return $this->belongsTo(TypeProfUser::class,'type_prof_user_id');
    }
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
}
