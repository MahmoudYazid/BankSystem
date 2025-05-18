<?php

namespace App\Http\Controllers;

use App\Http\Requests\ModifyUserRequest;
use App\Http\Requests\RegisterUserRequest;
use App\Http\Requests\SigninRequest;
use App\irepositories\IUser; 

class UserController extends Controller
{
    private IUser $userRepository_;

    public function __construct(IUser $UserRepository) {
        $this->userRepository_ = $UserRepository;
    }

    public function RegisterUser(RegisterUserRequest $request)
    {
        return $this->userRepository_->RegisterUser($request);
    }
        public function ModifyUser(ModifyUserRequest $request)
    {
        return $this->userRepository_->ModifyUser($request);
    }

        public function SignIn(SigninRequest $request)
    {
        return $this->userRepository_->SignIn($request);
    }
}