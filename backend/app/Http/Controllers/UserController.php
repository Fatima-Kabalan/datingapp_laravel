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
        $matches = DB::table('users')
            ->where('id', '!=', Auth::user()->id)
            ->where('gender', Auth::user()->preferred_gender)
            ->get();
        return response()->json([
            "status" => "Success",
            "matches" => $matches
        ]);
    }

    function getFavoriteUsers()
    {
        $favorites = DB::table('favorites')->where('user_id', Auth::user()->id)->get();
        $favoriteUsers = [];
        foreach ($favorites as $favorite) {
            $favoriteUsers[] = User::find($favorite->favorite_id);
        }
        return response()->json([
            "status" => "Success",
            "favorites" => $favoriteUsers
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

    function addFavorites(Request $request){
        DB::table('favorites')->insert([
            'favorite_id'=>$request->favorite_id,
            'user_id'=>Auth::user()->id,
        ]);
                
        return response()->json([
            "status" => "Success",
        ]);
    }

    function deleteFavorite(Request $request){
        DB::table('favorites')
        ->where('user_id','=', Auth::user()->id)
        ->where('favorite_id', '=', $request->favorite_id)
        ->delete();
        return response()->json([
            "status" => "Success",
        ]);
    }

    function getblocks(Request $request){
        $user_id = Auth::user()->id;
        $users = Block::select("blocked_id")
                ->where('blocker_id',$user_id)
                ->get();

        return response()->json([
            "status" => "Success",
            "data" => $users
        ]);
    }

    function addBlocks(Request $request){
        DB::table('blocks')->insert([
            'blocked_id'=>$request->blocked_id,
            'blocker_id'=>Auth::user()->id,
        ]);
                
        return response()->json([
            "status" => "Success",
        ]);
    }

    public function update(Request $request)
    {
        $user = User::find(Auth::user()->id);
        $user->name = $request->name ? $request->name : $user->name;
        $user->bio = $request->bio ? $request->bio : $user->bio;
        $user->age = $request->age ? $request->age : $user->age;
        $user->profile_pic = $request->profile_pic ? $request->profile_pic : $user->profile_pic;
        $user->preferred_gender = $request->preferred_gender ? $request->preferred_gender : $user->preferred_gender;
        $user->location = $request->location ? $request->location : $user->location;
        $user->status = $request->status ? $request->status : $user->status;
        $user->save();
        return response()->json([
            "status" => "success",
            "user" => $user
        ], 200);
    }

}
