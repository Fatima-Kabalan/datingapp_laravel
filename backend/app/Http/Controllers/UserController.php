<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Favorite;
use App\Models\Chat;
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

    function getFavorites(Request $request){
        $favorite_id = $request->favorite_id;
        $users = Favorite::select("*")
                ->where('favorite_id',$favorite_id)
                ->get();

        return response()->json([
            "status" => "Success",
            "data" => $users
        ]);
    }

    function getChats(Request $request){
        $sender_id= $request->sender_id;
        $recipient_id= $request->recipient_id;
        $users = Chat::select("message")
                ->where('sender_id',$sender_id)
                ->where('recipient_id',$recipient_id)
                ->get();

        return response()->json([
            "status" => "Success",
            "data" => $users
        ]);
    }



}
