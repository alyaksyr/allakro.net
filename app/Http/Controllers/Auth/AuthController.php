<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginFormRequest;
use App\Http\Requests\Auth\RegisterFormRequest;
use App\Models\Acteur;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function connexion()
    {
        return view('auth.login');
    }

    public function dologin(LoginFormRequest $request)
    {

        $credentials = $request->validated();

        
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $user = Auth::getUser();
            if ($user->role=='Root') {
                return redirect()->intended(route('admin.acteurs.index'));
            }
            return redirect()->intended(route('home'));
           
        }

        return back()->withErrors([
            'email' =>'Aucun utilisateur ne correspond aux données saisies!'
        ])->onlyInput('email');
    }

    public function register(){
        return view('auth.register');
    }

    public function save(RegisterFormRequest $request){

        $data = $request->validated();
        $password = $request->validated('password');
        $email = $request->validated('email');

        $credentials = [$email, $password];
    
        $data['password'] = Hash::make($request->validated('password'));

        if (User::create($data) != null) {

            $credentials = [
                'email' =>$email, 
                'password' =>$password
            ];
            if (Auth::attempt($credentials)) {

                $request->session()->regenerate();
                $user = Auth::getUser();
                return redirect()->intended(route('home'))->with('success', 'Compte créé avec succès');
               
            }
        }
        return back()->withErrors([
            'email' =>'Le compte n\'a pas pu être créé!'
        ])->onlyInput('email', 'contact', 'name');


        
    }



    public function logout()
    {
        Auth::logout();
        return to_route('login')->with('success' , 'Vous vous êtes déconnecté avec succès !');
    }
}
