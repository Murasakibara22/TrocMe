<?php

namespace App\Http\Livewire\ReglageUser;

use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;
use Intervention\Image\Image;
use Image as InterventionImage;

class AjoutImg extends Component
{
    use WithFileUploads;

    public $addPhoto =  null ;
    public $Userid ;


    protected $listeners = [
        'refresh-me' => '$refresh'
    ];


    public function mount($Userid){
        $this->Userid = $Userid ;
    }


    public function ModifierPhotoBannear(){

        $user = User::find($this->Userid);


        if ($this->addPhoto) {
            $img = $this->addPhoto;
                $pogba = md5($img->getClientOriginalExtension().time()."++").".".$img->getClientOriginalExtension();
                $source = $img;
                $target = 'images/User/'.$pogba;
                InterventionImage::make($source)->fit(1660,625)->save($target);//taille de la banner a chercher
                $user->bannear   =  $pogba;
        }else{
            $user->bannear   =  $user->bannear ;
        }


        $user->update();

        if($user->update()){
            session()->flash('message',"Photo Modifier avec succes");
        }
        $this->emitself('refresh-me');
        $this->addPhoto = '';
    }

    public function render()
    {
        return view('livewire.reglage-user.ajout-img');
    }
}
