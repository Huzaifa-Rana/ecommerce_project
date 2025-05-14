<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\User;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $totalProducts = Product::count();
        $totalOrders = Order::count();
        $totalRevenue = Order::sum('total');
        $customers = User::whereHas('roles', fn($q) => $q->where('name', 'customer'))
            ->withCount('orders')
            ->get();

        return view('admin.dashboard', compact('totalProducts', 'totalOrders', 'totalRevenue', 'customers'));
    }
}