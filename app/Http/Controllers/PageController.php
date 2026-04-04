<?php

namespace App\Http\Controllers;

class PageController extends Controller
{
    public function crDashboard()
    {
        return view('cr-dashboard');
    }

    public function buddyChat()
    {
        return view('buddy-chat');
    }

    public function buddyVisitor()
    {
        return view('buddy-visitor');
    }

    public function landing()
    {
        return view('landing');
    }
}
