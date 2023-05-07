<?php

namespace App\helper;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

class UserService
{
    public $name, $email, $password, $contact, $country;


    public function __construct($name, $email, $password, $contact, $country)
    {
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->contact = $contact;
        $this->country = $country;
    }

    public function validateInput()
    {
        $validator = Validator::make(['name' => $this->name, 'email' => $this->email, 'password' => $this->password, 'contact' => $this->contact, 'country' => $this->country,], [
            'name' => ['required', 'string', 'unique:users'],
            'email' => ['required', 'string', 'unique:users'],
            'password' => ['required', 'string', Password::min(4)],
            'contact' => ['required', 'string'],
            'country' => ['required', 'string']
        ]);

        if ($validator->fails()) {
            return ['status' => false, 'messages' => $validator->messages()];;
        } else {
            return ['status' => true];
        }
    }

    public function register($devicename)
    {
        $validate = $this->validateInput();
        if ($validate['status'] == false) {
            return $validate;
        } else {
            $user = User::create(['name' => $this->name, 'email' => $this->email, 'password' => Hash::make($this->password), 'contact' => $this->contact, 'country' => $this->country,]);
            $token = $user->createToken($devicename)->plainTextToken;

            return ['status' => true, 'token' => $token, 'user' => $user];
        }
    }
}
