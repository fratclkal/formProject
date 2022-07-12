<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    use HasFactory;
    protected $table = 'forms';
    protected $guarded = ['id'];

    function getUser(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    function getImages(){
        return $this->hasMany(File::class, 'form_id', 'id');
    }


}
