<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    //Table Name
    protected $table = 'posts';
    //Primary Key
    protected $PK = 'id';
    //Timestamps
    protected $value = 'true';
    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
