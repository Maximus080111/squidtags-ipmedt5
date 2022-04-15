<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function tags($id){
        return User::find($id)->myTags;
    }

    public function wachtrij($id){
        return User::find($id)->myWachtrijen;
    }
}
