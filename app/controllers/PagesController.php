<?php
namespace App\Controllers;

class PagesController
{
    public function index()
    {
        return view('index');
    }

    public function contact()
    {
        return view('contact');
    }

    public function about(){
        return view('about');
    }

    public function aboutCulture(){
        return view('about-culture');
    }
}
