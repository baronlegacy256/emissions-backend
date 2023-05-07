<?php

namespace App\helper;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\Rules\Unique;


class LoginService
{
    public  $email, $password;


    public function __construct($email, $password)
    {

        $this->email = $email;
        $this->password = $password;
    }

    public function validateInput($auth = false)
    {
        $validationRule = $auth ? 'exists:users' : 'unique:users';
        $validator = Validator::make(['email' => $this->email, 'password' => $this->password], [

            'email' => ['required', 'string', $validationRule],
            'password' => ['required', 'string', Password::min(4)],

        ]);

        if ($validator->fails()) {
            return ['status' => false, 'messages' => $validator->messages()];;
        } else {
            return ['status' => true];
        }
    }

    public function login($devicename)
    {
        $validate = $this->validateInput(true);
        if ($validate['status'] == false) {
            return $validate;
        } else {
            $user = User::where(['email' => $this->email])->first();
            if (Hash::check($this->password, $user->password)) {
                $token = $user->createToken($devicename)->plainTextToken;
                return ['status' => true, 'token' => $token, 'user' => $user];
            } else {
                return ['status' => false, 'Message' => 'Incorrect Credentails'];
            }
        }
    }
}
