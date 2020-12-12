<?php

namespace Auth\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class AuthController extends Controller
{
    public function login(Request $request)
    {
        //GET User Phone Number
        $phoneNumber = $request->input('phoneNumber');

        //Validation Phone Number
        $validated = $request->validate([
            'phoneNumber' => 'required|unique:users,phone_Number|digits:11',
        ]);
        
        
    }
    
}
