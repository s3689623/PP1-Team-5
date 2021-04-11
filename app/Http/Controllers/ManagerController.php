<?php

namespace App\Http\Controllers;

use App\Models\Manager;
use Illuminate\Http\Request;

class ManagerController extends Controller
{
    public function showLogin($errors = [])
    {
        $page_title = 'Manager Login';
        $page_description = '';

        // redirect if already login
        $user = session('user');
        if (!!$user) {
            switch ($user['role']) {
                case 'manager':
                    $redirectURL = '/manager';
                    break;
                case 'member':
                    $redirectURL = '/member';
                    break;
                case 'admin':
                    $redirectURL = '/admin';
                    break;
            }
            return redirect($redirectURL);
        } else {
            return view('pages.manager.login', compact('page_title', 'page_description'))->with('errors', $errors);
        }
    }

    public function managerLogin(Request $request)
    {
        $input = $request->all();

        $manager = Manager::where('username', $input['username'])->first();
        $manager['role'] = 'manager';
        if ($manager) {
            $request->session()->put('user', $manager);

            if (!!$request->get('redirect')) {
                $redirectURL = $request->get('redirect');
            } else {
                $redirectURL = 'manager';
            }

            return redirect('/' . $redirectURL);
        } else {
            return self::showLogin(['403' => 'Incorrect username or password']);
        }
    }

    public function managerLogout(Request $request)
    {
        $request->session()->forget('user');

        return redirect('/manager/login');
    }

    public function showDashboard()
    {
        $page_title = 'Manager Center';
        $page_description = 'overview';

        return view('pages.manager.dashboard', compact('page_title', 'page_description'));
    }
}
