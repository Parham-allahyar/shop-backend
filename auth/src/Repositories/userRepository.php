<?php

namespace Auth\Repositories;

use App\Models\User;

class UserRepository
{

    public function getUserByUserId($id)
    {
        return User::where('user_id', $id)
            ->get();
    }

    public function getUserByPhoneNumber($phoneNumber)
    {
        return User::where('phone_Number', $phoneNumber)
            ->first();
    }

    public function createUser($phoneNumber)
    {

        User::create([
            'phone_Number' => $phoneNumber,
        ]);
        
    }

}