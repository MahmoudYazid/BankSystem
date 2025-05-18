<?php
namespace App\irepositories;
use App\Http\Requests\RegisterUserRequest;
use App\Http\Requests\SigninRequest;
use App\Http\Requests\ModifyUserRequest;


interface IUser
{
    public function RegisterUser(RegisterUserRequest $request):string ;
    public function SignIn(SigninRequest $request):string ;
    public function ModifyUser(ModifyUserRequest $request):string ;
    
    
}