<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserModel;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return UserModel::all();
    }

    public function getOne($id)
    {
        return UserModel::find($id);
    }

    public function store(Request $request){

        $request->validate([
            'name'=>'required|max:100',
            'middle_name'=>'required|max:100',
            'last_name'=>'required|max:100'
        ]);

        $user = new UserModel();
        $user->name =$request->name;
        $user->middle_name =$request->middle_name;
        $user->last_name =$request->last_name;

        $user->save();

        return response()->json(['message'=> $user, 200]);
    }

    public function delete($id){
        $user =  UserModel::find($id);
        $user -> delete();
        return response()->json(['message'=>'User deleted', 200]);
    }

    public function update(Request $request){
        $user = UserModel::find($request -> id);
        $user->name =$request->name;
        $user->middle_name =$request->middle_name;
        $user->last_name =$request->last_name;

        $user->save();

        return response()->json(['message'=>'User updated', 200]);
    }
}
