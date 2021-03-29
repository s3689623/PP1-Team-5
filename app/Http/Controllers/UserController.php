<?php

namespace App\Http\Controllers;

class UserController extends Controller
{
    public function showDashboard()
    {
        $page_title = 'Member Center';
        $page_description = 'overview';

        return view('pages.user.dashboard', compact('page_title', 'page_description'));
    }
}
