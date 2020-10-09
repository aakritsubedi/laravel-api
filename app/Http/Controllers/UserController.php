<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::get()->toJson(JSON_PRETTY_PRINT);

        return response($users, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        return response()->json([
            "status" => 1,
            "message" => "User data added successfully."
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(User::where('id', $id)->exists()){
            $user = User::findOrFail($id)->toJson(JSON_PRETTY_PRINT);

            return response($user, 200);
        }
        else {
            return response()->json([
                "success" =>  0,
                "message" => 'User not found'
            ], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(User::where('id', $id)->exists()){
            $user = User::findOrFail($id)->update($request->all());

            return response()->json([
                "success" =>  1,
                "message" => 'User record updated successfully'
            ], 404);
        }
        else {
            return response()->json([
                "success" =>  0,
                "message" => 'User not found'
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(User::where('id', $id)->exists()){
            $user = User::destroy($id);

            return response()->json([
                "success" =>  1,
                "message" => 'User record deleted'
            ], 404);
        }
        else {
            return response()->json([
                "success" =>  0,
                "message" => 'User not found'
            ], 404);
        }
    }
}
