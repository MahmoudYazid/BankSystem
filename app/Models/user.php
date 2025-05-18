<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class user extends Authenticatable implements JWTSubject


{
    use Notifiable;
    protected $fillable = [
    'name',
    'email',
    'phone',
    'password',
    'role',
];
public function getJWTIdentifier()
    {
        return $this->getkey();
    }

    
    public function getJWTCustomClaims()
    {
        return [
            'user_id' => $this->id,
            'role' => $this->role,

        ];
    }
}
