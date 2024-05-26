<?php

namespace App\Http\Controllers;

use App\Models\Order;

class DashboardController extends Controller
{
    function index()
    {
        $order_count = Order::byUser()->count();
        return view('admin.admin_dashboard', compact('order_count'));
    }
}
