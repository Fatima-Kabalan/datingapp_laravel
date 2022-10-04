<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;


class UserController extends Controller
{
    function getUsers(Request $request){
        $prefered_gender = $request->preferred_gender;
        $users = User::select("*")
                ->where('gender',$prefered_gender)
                ->get();

        return response()->json([
            "status" => "Success",
            "data" => $users
        ]);
    }
}
