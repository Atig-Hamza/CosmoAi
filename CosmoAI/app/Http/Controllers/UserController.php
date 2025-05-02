<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{       
    public function deleteUser(Request $request, User $user)
    {
        $user->delete();
        return redirect()->back();
    }
}
