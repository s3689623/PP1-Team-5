<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Manager;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

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

    public function showUsers()
    {
        $page_title = 'User List';
        $page_description = '';

        return view('pages.manager.user-list', compact('page_title', 'page_description'))
            ->with('users', User::All());
    }

    public function showNewUser($errors = [])
    {
        $page_title = 'Create New User';
        $page_description = '';

        return view('pages.manager.user-new', compact('page_title', 'page_description'));
    }

    public function newUser(Request $request)
    {
        $page_title = 'User List';
        $page_description = '';

        $input = $request->all();
        $errors = [];

        if (User::where('email', $input['email'])->first()) {
            array_push($errors, 'This email has been registered!');
        }

        if ($input['password'] !== $input['confirm-password']) {
            array_push($errors, 'Password and confirm password not the same!');
        }

        if (count($errors) == 0) {
            User::create([
                'email' => $input['email'],
                'first_name' => $input['first-name'],
                'last_name' => $input['last-name'],
                'password' => Hash::make($input['password']),
            ]);
            return redirect('/manager/member/list');
        }

        return view('pages.manager.user-new', compact('page_title', 'page_description'))->with('errors', $errors);
    }

    public function showUpdateSelf() {
        $page_title = 'Update Self Detail';
        $page_description = '';

        return view('pages.manager.self-update', compact('page_title', 'page_description'))
            ->with('manager', Manager::firstWhere('id', session('user')->id));
    }

    public function updateSelf(Request $request) {
        $input = $request->all();
        Manager::where('id', session('user')->id)->update([
            'username' => $input['username'],
        ]);

        return redirect('/manager/self/update');
    }

    public function showUpdateUser($userId) {
        $page_title = 'Update User Detail';
        $page_description = '';

        return view('pages.manager.user-update', compact('page_title', 'page_description'))
            ->with('user', User::firstWhere('id', $userId));
    }

    public function updateUser(Request $request, $userId) {
        $input = $request->all();
        User::where('id', $userId)->update([
            'email' => $input['email'],
            'first_name' => $input['first_name'],
            'last_name' => $input['last_name'],
        ]);

        return redirect('/manager/member/update/' . $userId);
    }
}
