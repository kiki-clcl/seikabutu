<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user;

class NameController extends Controller
{
    
    public function index(User $user)
    {
        
        return view('users.name')->with(['user' => $user->first()]);
    }
        //
    
   // public function edit(User $user)
   // {
       // return view('users.edit')->with(['user' => $user]); 
   // }
    
    public function edit($id)
{
    $user = User::find($id);
    return view('users.edit', ['user' => $user]);
}

}
