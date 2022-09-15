<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function add()
    {
        return view("backend.user.adduser");
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'cpassword' => 'required',
        ]);

        if($request->password == $request->cpassword){
            $user = new User;

            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);

            $user->save();
            return redirect()->route("user.show")->with("message","User Added Successfully");
        }
        else{
            return back()->with("message","Password Does not match");
        }
    }

    public function show()
    {
        $alluser= User::all();
        return view("backend.user.manageuser",compact("alluser"));
    }

    public function delete($id)
    {
        $user= User::find($id);
        $user->delete();
        return redirect()->route("user.show")->with("message","User Deleted Successfully");
    }

    public function edit($id)
    {
        $user= User::find($id);
        return view('backend.user.edituser',compact("user"));
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);

        if($request->password == $request->cpassword){

            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);

            $user->update();
            return redirect()->route("user.show")->with("message","User Updated Successfully");
        }
        else{
            return back()->with("message","Password Does not match");
        }

    }
}
