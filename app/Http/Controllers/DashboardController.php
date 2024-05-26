<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\Gate;

class DashboardController extends Controller
{
    function index()
    {
        if (Gate::allows('isAdmin')) {
            $order_count = Order::count();
            $customer_count = User::where('level', 'Customer')->count();
        } else {
            $order_count = Order::byUser()->count();
        }
        return view('admin.admin_dashboard', compact('order_count', 'customer_count'));
    }
}
