<?php

namespace Auth\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth\Facades\userProviderFacade;
use Auth\Facades\storeCodeFacade;
use Carbon\Carbon;
use App\Models\User;
use Tymon\JWTAuth\Facades\JWTAuth;
use Notification\Facade\notificationFacade;
use Tymon\JWTAuth\Exceptions\JWTException;
class AuthController extends Controller
{
    public function login(Request $request)
    {
        //GET User Phone Number
        $phoneNumber = $request->input('phoneNumber');

        //Validation Phone Number
        $validated = $request->validate([
            'phoneNumber' => 'required',
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
       // notificationFacade::sendsms($user->phone_Number, $code);
      
        return $code;
    }


    public function auth()
    {
        $receivedCode = request('code');
       
        $userId = storeCodeFacade::getCode($receivedCode);
        $user = User::find($userId);
        if ($userId !== null) {

            //Send Response
            $token = JWTAuth::fromUser($user);
            return $this->respondWithToken($token);
        } else {
            return redirect('/login');
        }
    }
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            //'expires_in' => auth()->Carbon::now()->subDays(30)
        ]);
    }
    
}

