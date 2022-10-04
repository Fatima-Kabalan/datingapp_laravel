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

    function getFavorites(Request $request){
        $user_id = Auth::user()->id;
        $users = Favorite::select("*")
                ->where('user_id',$user_id)
                ->get();

        return response()->json([
            "status" => "Success",
            "data" => $users
        ]);
    }

    function getChats(Request $request){
        $sender_id = Auth::user()->sender_id;
        $recipient_id = Auth::user()->recipient_id;
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

    // function addFavorites(Request $request){
    //     $user_id = Auth::user()->id;
    //     $users = Favorite::insert("favorite_id")
    //             ->where('user_id',$user_id);
                

    //     return response()->json([
    //         "status" => "Success",
    //         "data" => $users
    //     ]);
    // }

    function getblocks(Request $request){
        $user_id = Auth::user()->id;
        $users = Favorite::select("blocked_id")
                ->where('user_id',$user_id)
                ->get();

        return response()->json([
            "status" => "Success",
            "data" => $users
        ]);
    }
    
}
