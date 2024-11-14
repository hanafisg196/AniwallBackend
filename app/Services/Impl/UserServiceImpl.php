<?php
namespace App\Services\Impl;

use App\Models\User;
use App\Services\UserService;

class UserServiceImpl implements UserService {
    public function getUsers(){
        return User::latest()->paginate(10);
    }
}
