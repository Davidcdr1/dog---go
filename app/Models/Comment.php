<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Comment extends Model
{
    //use HasFactory;
    protected $table = 'comments';
	
	// Relación de Muchos a Uno
	public function user(){
		return $this->belongsTo(User::class, 'user_id');
	}

	// Relación de Muchos a Uno
	public function image(){
		return $this->belongsTo(Image::class, 'image_id');
	}
}
