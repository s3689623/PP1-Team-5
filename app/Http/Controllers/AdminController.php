<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Manager;
use App\Models\Car;
use App\Models\Make;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
            return view('pages.admin.login', compact('page_title', 'page_description'))->with('errors', $errors);
        }
    }

    public function adminLogin(Request $request)
    {
        $input = $request->all();

        $admin = Admin::where('username', $input['username'])->first();
        $admin['role'] = 'admin';
        if ($admin) {
            $request->session()->put('user', $admin);

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

    public function showManagers()
    {
        $page_title = 'Manager List';
        $page_description = '';

        return view('pages.admin.manager-list', compact('page_title', 'page_description'))
            ->with('managers', Manager::All());
    }

    public function showNewManager($errors = [])
    {
        $page_title = 'Create New Manager';
        $page_description = '';

        return view('pages.admin.manager-new', compact('page_title', 'page_description'));
    }

    public function newManager(Request $request)
    {
        $page_title = 'Manager List';
        $page_description = '';

        $input = $request->all();
        $errors = [];

        if (Manager::where('username', $input['username'])->first()) {
            array_push($errors, 'This username has been used!');
        }

        if ($input['password'] !== $input['confirm-password']) {
            array_push($errors, 'Password and confirm password not the same!');
        }

        if (count($errors) == 0) {
            Manager::create([
                'username' => $input['username'],
                'password' => Hash::make($input['password']),
            ]);
            return redirect('/admin/manager/list');
        }

        return view('pages.admin.manager-new', compact('page_title', 'page_description'))->with('errors', $errors);
    }

    public function showCars()
    {
        $page_title = 'Car List';
        $page_description = '';

        return view('pages.admin.car-list', compact('page_title', 'page_description'))
            ->with('cars', Car::All());
    }

    public function showEditCar($carId)
    {
        $page_title = 'Edit Car';
        $page_description = '';

        return view('pages.admin.car-edit', compact('page_title', 'page_description'))
            ->with('makes', Make::all())->with('users', User::all())->with('car', Car::firstWhere('id', $carId));
    }

    public function showNewCar()
    {
        $page_title = 'Create New Car';
        $page_description = '';

        return view('pages.admin.car-new', compact('page_title', 'page_description'))
            ->with('makes', Make::all())->with('users', User::all());
    }

    public function newCar(Request $request)
    {
        $input = $request->all();

        Car::create([
            'user_id' => $input['user_id'],
            'make_id' => $input['make_id'],
            'number' => $input['number'],
            'type' => $input['type'],
            'color' => $input['color'],
            'lat' => $input['lat'],
            'lng' => $input['lng'],
        ]);


        return redirect('/admin/car/list');
    }

    public function editCar(Request $request, $carId)
    {
        $input = $request->all();

        Car::where('id', $carId)->update([
            'user_id' => $input['user_id'],
            'make_id' => $input['make_id'],
            'number' => $input['number'],
            'type' => $input['type'],
            'color' => $input['color'],
            'lat' => $input['lat'],
            'lng' => $input['lng'],
        ]);


        return redirect("/admin/car/$carId");
    }
}
