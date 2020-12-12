<?php

namespace Auth\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth\Facades\userProviderFacade;
use Auth\Facades\storeCodeFacade;

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
        
        //Find User
        $user = userProviderFacade::getUserByPhoneNumber($validated);
    
        // OR Create User

        if (is_null($user)) {

            userProviderFacade::createUser($phoneNumber);
            $user = userProviderFacade::getUserByPhoneNumber($phoneNumber);
        }

        //Generate Verification Code
        $code = random_int(100000, 999999);

        // Cache Verification Code
        storeCodeFacade::saveCode($code, $user->id);

        //send Code
        NotificationModule::sendsms($user->phone_Number, $code);
        
    }
    
}
