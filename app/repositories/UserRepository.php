<?php
namespace App\repositories;
use App\Http\Constants\UserTypes;
use App\Http\Requests\SigninRequest;
use App\Http\Requests\ModifyUserRequest;
use App\Http\Requests\RegisterUserRequest;
use App\Models\user;
use App\irepositories\IUser;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Hash;

class UserRepository implements IUser 
{

    public user $userModel_;
    public UserTypes $userTypes_; 

    public function __construct(user $userModelInstant,UserTypes $userTypesInstant) {
        $this->userTypes_ = $userTypesInstant;
        
        $this->userModel_ = $userModelInstant;
        
    }
    public function RegisterUser(RegisterUserRequest $request):string {
        $check = $this->userModel_->query()->where('email', $request->get('email'))->first();
        if ($check ) {
            return "User already exists";
        }else {
           $newUser = $this->userModel_->query()->create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
            'phone' => $request->get('phone'),
            'role' => $this->userTypes_->Normaluser,
        ]);
        return $newUser;
        }
        
        
        return "";
    
    }
    public function SignIn(SigninRequest $request):string {
        $credentials = [
    'email' => $request->get('email'),
    'password' => $request->get('password'),
];
        $token = JWTAuth::attempt($credentials);
        if (!$token) {
            return "Invalid credentials";
        }else {
            return $token;
        }
        
        


    }
    public function ModifyUser(ModifyUserRequest $request):string {
        $newData=$request->get('data');
        $column=$request->get('column');
        $Id_User=$request->get('Id_user');
        switch ($column) {
            case 'name':
                $newData = $request->get('data');
                break;
            case 'email':
                $newData = $request->get('data');
                break;
            case 'phone':
                $newData = $request->get('data');
                break;
            case 'password':
                $newData = $request->get('data');
                break;
            default:
                return "Invalid column name";
        }
        $targetUpade=$this->userModel_->query()->where('id', $Id_User)->update([
            $column => $newData,
        ]);
        return $targetUpade;
    }



}