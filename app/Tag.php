<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['name', 'slug'];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function posts(){
        return $this->belongsToMany('App\Post');
    }
}
