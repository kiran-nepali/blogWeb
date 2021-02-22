<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    
    public function index(){
        $title = 'Welcome to Your Blog';
        return view('pages.index')->with('title',$title);
    }

    public function about(){
        return view('pages.about');
    }
}
