<?php

namespace App\Http\Controllers;

use App\Http\Requests\NameRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class NameController extends Controller
{
    
    public function index(User $user)
    {
        dd($user->first());
        return view('users.name')->with(['user' => $user->first()]);
        
    }
        //
    
   // public function edit(User $user)
   // {
       // return view('users.edit')->with(['user' => $user]); 
   // }
    
    public function edit($id)
{
    
    $user = Auth::user();
    //$user = User::find($id);
    
    return view('users.edit', ['user' => $user]);
}

   
    
    public function update(NameRequest $request)
{
    $user = Auth::user();
    
    //$request->input('name');
    //$request->input('body');
    
    $profile_name = $request->input('name');
    $profile_body = $request->input('body');
    
    //dd(Auth::user());
    //$user->fill(['name' => $input_name, 'body' => $input_body])->save();
    $user->fill($request->all())->save();
    return redirect('/');//聞く
    //return redirect('/' . $user->id);
}


    
    


    public function hellow(User $user)
    {
        return view('users.name')->with(['user' => $user->first()]);
    }

}
