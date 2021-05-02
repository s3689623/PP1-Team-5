<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Order;
use App\Models\User;
use App\Models\Payment;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function showDashboard()
    {
        $page_title = 'Member Center';
        $page_description = 'overview';

        return view('pages.user.dashboard', compact('page_title', 'page_description'));
    }

    public function userLogin(Request $request)
    {
        $input = $request->all();

        $user = User::where('email', $input['email'])->first();
        if ($user) {
            if (Hash::check($input['password'], $user->password)) {
                $user['role'] = 'member';
                $request->session()->put('user', $user);

                return redirect('/');
            }
        }

        return view('pages.user.login')->with('errors', ['Username or password is incorrect!']);
    }

    public function userRegister(Request $request)
    {
        $input = $request->all();
        $errors = [];

        if (User::where('email', $input['email'])->first()) {
            array_push($errors, 'This email has been registered!');
        }

        if ($input['password'] !== $input['confirm-password']) {
            array_push($errors, 'Password and confirm password not the same!');
        }

        if (count($errors) == 0) {
            $user = User::create([
                'email' => $input['email'],
                'first_name' => $input['first-name'],
                'last_name' => $input['last-name'],
                'password' => Hash::make($input['password']),
            ]);
            $user['role'] = 'member';
            $request->session()->put('user', $user);

            return redirect('/member');
        }

        return view('pages.user.register')->with('errors', $errors);
    }

    public function userLogout()
    {
        session(['user' => null]);

        return redirect('/member/login');
    }

    public function showDashboardPage()
    {
        return view('pages.user.dashboard');
    }

    public function showCars()
    {
        $page_title = 'Car List';
        $page_description = '';

        return view('pages.user.car-list', compact('page_title', 'page_description'))->with('cars', Car::where('status', 'free')->get());
    }

    public function orderCar($carId)
    {
        $car = Car::where('id', $carId)->first();
        $car->update(['status' => 'ordered']);

        Order::create([
            'user_id' => session('user')->id,
            'car_id' => $carId
        ]);
        return redirect('/member/order/list');
    }

    public function cancelOrder($orderId)
    {
        $order = Order::where('id', $orderId)->first();
        $car = Car::where('id', $order->car_id)->first();
        $car->update(['status' => 'free']);
        $order->delete();
        return redirect('/member/order/list');
    }

    public function payOrder($orderId)
    {
        $order = Order::where('id', $orderId)->first();
        $car = Car::where('id', $order->car_id)->first();
        $car->update(['status' => 'free']);
        $order->update(['status' => 'paid']);
        return redirect('/member/order/list');
    }

    public function showOrders()
    {
        $page_title = 'Order List';
        $page_description = '';

        return view('pages.user.order-list', compact('page_title', 'page_description'))
            ->with('orders', Order::where('user_id', session('user')->id)->get());
    }
}

?>
