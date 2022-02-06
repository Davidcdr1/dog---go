<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Models\Comment;


class CommentController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function save(Request $request){

        // Validación
		$validate = $this->validate($request, [
			'image_id' => 'integer|required',
			'content' => 'string|required'
		]);
        //recoger datos
        
        $image_id = $request->input('image_id');
        $content = $request->input('content');

        //asignar valores al nuevo objeto a guardar
        $user = Auth::user();
        $comment = new Comment();
        $comment->user_id = $user->id;
        $comment->image_id = $image_id;
        $comment->content = $content;

        //guardar en base datos
        $comment->save();

        //redireccion
        return redirect()->route('image.detail', ['id' => $image_id])
                         ->with([
                             'message' => 'Comment created'
                         ]);
  }

  public function delete($id){
    // Conseguir datos del usuario logueado 
    $user = Auth::user();
    
    // Conseguir objeto del comentario
    $comment = Comment::find($id);
    
    // Comprobar si soy el dueño del comentario o de la publicación
    if($user && ($comment->user_id == $user->id || $comment->image->user_id == $user->id)){
        $comment->delete();
        
        return redirect()->route('image.detail', ['id' => $comment->image->id])
                     ->with([
                        'message' => 'Comment deleted!!'
                     ]);
    }else{
        return redirect()->route('image.detail', ['id' => $comment->image->id])
                     ->with([
                        'message' => 'EL COMENTARIO NO SE HA ELIMINADO!!'
                     ]);
    }
}
}
