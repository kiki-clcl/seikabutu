<?php

namespace App\Http\Controllers;

use App\Http\Requests\NameRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Cloudinary;
use App\Models\Category;


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
    
    public function edit($id, Category $category)
{
    
    $user = Auth::user();
    //$user = User::find($id);
    
    $category = Category::all();
    
    return view('users.edit', ['user' => $user, 'categories' => $category]);
    
   //return view('users.edit', ['user' => $user])->with(['category' => $category->get()]);
}

   
    
    public function update(NameRequest $request,User $user, Category $category)
{
    $user = Auth::user();
    
    //$request->input('name');
    //$request->input('body');
    
    //$input = $request->all(); 
    
    $profile_name = $request->input('name');
    $profile_body = $request->input('body');
    
    if($request->file('icon')){
    $icon_url = Cloudinary::upload($request->file('icon')->getRealPath())->getSecurePath();
    
    $request->merge(['icon_url' => $icon_url]);
    }
   
    $request->input('category_id');
    //$input += ['icon_url' => $icon_url];
   
    //dd($profile_icon_url);
    //$user->fill(['name' => $input_name, 'body' => $input_body])->save();
    
    //$user->fill($input)->save();
    
    $user->fill($request->all())->save();
    dd($user);
    return redirect('/');//聞く
    //return redirect('/' . $user->id);
}

    public function hellow(User $user, Category $category)
    {
        $user = Auth::user();
        
        return view('users.name')->with(['user' => $user]);//->first()]);
    }

}
