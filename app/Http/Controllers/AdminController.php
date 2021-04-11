<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
class AdminController extends Controller
{
    public function showLogin($errors = [])
    {
        $page_title = 'Admin Login';
        $page_description = '';

        // redirect if already login
        $user = session('user');
        if (!!$user) {
            switch ($user['role']) {
                case 'admin':
                    $redirectURL = '/admin';
                    break;
                case 'member':
                    $redirectURL = '/member';
                    break;
                case 'dealer':
                    $redirectURL = '/dealer';
                    break;
            }
            return redirect($redirectURL);
        } else {
            return view('pages.admin.login', compact('page_title', 'page_description'))->with('errors', $errors);
        }
    }

    public function adminLogin(Request $request)
    {
        $input = $request->all();

        $admin = Admin::where('username', $input['username'])->first();
        if ($admin) {
            $request->session()->put('user', [
                'role' => 'admin',
            ]);

            if (!!$request->get('redirect')) {
                $redirectURL = $request->get('redirect');
            } else {
                $redirectURL = 'admin';
            }

            return redirect('/' . $redirectURL);
        } else {
            return self::showLogin(['403' => 'Incorrect username or password']);
        }
    }

    public function adminLogout(Request $request)
    {
        $request->session()->forget('user');

        return redirect('/admin/login');
    }

    public function showDashboard()
    {
        $page_title = 'Admin Center';
        $page_description = 'overview';

        return view('pages.admin.dashboard', compact('page_title', 'page_description'));
    }
}
