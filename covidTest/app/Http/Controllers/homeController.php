<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hospital;

class homeController extends Controller
{
    function homePage(){
        $hospitals = Hospital::all(); 
        return view('home.index', compact('hospitals'));
    }

    function aboutPage(){
        return view('home.about');
    }

    function contactPage(){
        return view('home.contact');
    }

    function guidelinePage(){
        return view('home.guidelines');
    }

    
}
