<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use App\Models\User;





class UserController extends Controller
{
	
	public function __construct(){
        $this->middleware('auth');
    }

	public function index($search = null){
		if(!empty($search)){
			$users = User::where('nick', 'LIKE', '%'.$search.'%')
							->orWhere('name', 'LIKE', '%'.$search.'%')
							->orWhere('surname', 'LIKE', '%'.$search.'%')
							->orderBy('id', 'desc')
							->paginate(5);
		}else{
			$users = User::orderBy('id', 'desc')->paginate(5);
		}
		
		return view('index',[
			'users' => $users
		]);
	}
	

	public function config(){
		return view('config');
	}
	
	public function update(Request $request){
		
		// Conseguir usuario identificado
		$user = Auth::user();
		$id = $user->id;
		
		// Validación del formulario
		$validate = $this->validate($request, [
            'name' => 'required|string|max:255',
			'surname' => 'required|string|max:255',
			'nick' => 'string|max:255|unique:users,nick,'.$id,
            'email' => 'string|email|max:255|unique:users,email,'.$id,
			'country' => 'string|max:255',
			'city' => 'string|max:255',
			'biography' => 'string|max:255',
			'namedog' => 'string|max:255',
			'breed' => 'string|max:255',
			'genre' => 'string|max:255',
			'biographydog' => 'string|max:255',
			

        ]);
		
		// Recoger datos del formulario
		$name = $request->input('name');
		$surname = $request->input('surname');
		$nick = $request->input('nick');
		$email = $request->input('email');
		$country = $request->input('country');
		$city = $request->input('city');
		$biography = $request->input('biography');
		$namedog = $request->input('namedog');
		$breed = $request->input('breed');
		$genre = $request->input('genre');
		$biographydog = $request->input('biographydog');
		// Asignar nuevos valores al objeto del usuario
		$user->name = $name;
		$user->surname = $surname;
		$user->nick = $nick;
		$user->email = $email;
		$user->country = $country;
		$user->city = $city;
		$user->biography = $biography;
		$user->namedog = $namedog;
		$user->breed = $breed;
		$user->genre = $genre;
		$user->biographydog = $biographydog;
		
		// Subir la imagen
		$image_path = $request->file('image_path');
		if($image_path){
			// Poner nombre unico
			$image_path_name = time().$image_path->getClientOriginalName();
			
			// Guardar en la carpeta storage (storage/app/users)
			Storage::disk('users')->put($image_path_name, File::get($image_path));
			
			// Seteo el nombre de la imagen en el objeto
			$user->image = $image_path_name;
		}
		//imagen perfil
		$image_profile = $request->file('image_profile');
		if($image_profile){
			// Poner nombre unico
			$image_profile_name = time().$image_profile->getClientOriginalName();
			
			// Guardar en la carpeta storage (storage/app/users)
			Storage::disk('imgprofiles')->put($image_profile_name, File::get($image_profile));
			
			// Seteo el nombre de la imagen en el objeto
			$user->imgprofile = $image_profile_name;
		}
		//imagen perfil perro
		$image_profilep = $request->file('image_profilep');
		if($image_profilep){
			// Poner nombre unico
			$image_profilep_name = time().$image_profilep->getClientOriginalName();
			
			// Guardar en la carpeta storage (storage/app/users)
			Storage::disk('imgprofilesp')->put($image_profilep_name, File::get($image_profilep));
			
			// Seteo el nombre de la imagen en el objeto
			$user->imgprofilep = $image_profilep_name;
		}
		
		// Ejecutar consulta y cambios en la base de datos
		$user->update();
		
		return redirect()->route('config')
						 ->with(['message'=>'User updated']);
	}
	
	public function getImage($filename){
		$file = Storage::disk('users')->get($filename);
		return new Response($file, 200);
	}
	public function getImage1($filename){
		$file = Storage::disk('imgprofiles')->get($filename);
		return new Response($file, 200);
	}
	public function getImage2($filename){
		$file = Storage::disk('imgprofilesp')->get($filename);
		return new Response($file, 200);
	}
	

    public function profileus()
    {
        return view('profileus');
    }

	public function profile($id){
       $user = User::find($id);
	   return view('profile', [
		   'user' => $user	   ]);
	}

	

}



