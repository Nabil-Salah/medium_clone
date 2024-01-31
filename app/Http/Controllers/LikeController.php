<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function like(User $user){
        $liker = auth()->user();

        $liker->likings()->attach($user);

        return redirect()->route('users.show',$user->id)->with('success',"liked successfully!");
    }

    public function unlike(User $user){
        $follower = auth()->user();

        $follower->likings()->detach($user);

        return redirect()->route('users.show',$user->id)->with('success',"unfollowed successfully!");
    }
}
