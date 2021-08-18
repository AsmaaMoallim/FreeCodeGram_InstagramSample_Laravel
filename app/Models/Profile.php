<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{

    protected $guarded = []; //disable MassAssignmentException
    use HasFactory;


    public function user(){
        return $this->belongsTo(User::class);


// The model that calls $this->belongsTo()
// is the owned model in one-to-one and many-to-one relationships
// and holds the key of the owning model.
    }
    public function followers(){
        return $this->belongsToMany(User::class);
    }
    public function defaultProfileImage(){

        $imagePath = ($this->image)? '/storage/'.$this->image:'/svg/DefaultProfileImage.svg';
       return $imagePath;

    }
}
