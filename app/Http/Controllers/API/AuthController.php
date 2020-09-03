<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class AuthController extends Controller
{
    public function register(Request $request)//rejestracja
    {

        $validatedData = $request->validate([ //walidacja danych rejestracji
            'name' => 'required|max:50',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
            //password_confirmation
        ]);

        $validatedData['password'] = bcrypt($request->password); //haszowanie hasła

        $user = User::create($validatedData); //zapisanie uzytkownika

        $accessToken = $user->createToken('authToken')->accessToken; //utworzenie tokena

        return response([ 'user' => $user, 'access_token' => $accessToken]); //zwrócenie użytkownika wraz z tokenem
    }

    public function login(Request $request)//logowanie
    {
        $loginData = $request->validate([//walidacja danych logowania
            'email' => 'email|required',
            'password' => 'required'
        ]);

        if (!auth()->attempt($loginData)) { //autoryzacja
            return response(['message' => 'Nieprawidłowe dane']);
        }

        $accessToken = auth()->user()->createToken('authToken')->accessToken;//utwozenie tokena

        return response(['user' => auth()->user(), 'access_token' => $accessToken]);//zwrócenie uzytkownika i tokena
    }
}
