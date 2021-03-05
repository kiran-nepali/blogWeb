<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;


class DashboardController extends Controller
{
    public function index(){
        // dd(auth()->user());
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        return view('dashboard',['posts'=>$user->posts]);
    }
}
