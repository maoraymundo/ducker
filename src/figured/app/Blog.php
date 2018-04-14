<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = [
        'title', 'content', 'status', 'user_id'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }
}
