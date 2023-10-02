<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\NameRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;

class MatchController extends Controller
{
    public function match(User $user)
    {
        $user = Auth::user();
        
        return view('users.match')->with(['user' => $user]);
    }
    //
}
