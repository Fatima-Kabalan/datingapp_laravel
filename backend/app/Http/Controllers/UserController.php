<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Favorite;
use App\Models\Chat;
use App\Models\Block;
use Illuminate\Support\Facades\DB;
use Auth;


class UserController extends Controller
{
    function getUsers(Request $request){
        $preferred_gender = Auth::user()->preferred_gender;
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
