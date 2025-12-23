<?php

namespace App\Http\Controllers;
use App\Models\Restaurant;
use Illuminate\Support\Facades\Storage;

class Restaurants extends Controller
{
    public function index() {
        $restaurants = Restaurant::all();
        return view('home', compact('restaurants'));
    }

    public function show($id)
    {
        $restaurant = Restaurant::with('menus')->findOrFail($id);
        return view('menu', compact('restaurant'));
    }

    public function adminHome()
    {
        abort_if(!auth()->check() || auth()->user()->role !== 'admin', 403);

        $restaurants = Restaurant::all();

        return view('Admin.admin_home', compact('restaurants'));
    }

    public function destroy($id)
    {
        $restaurant = restaurant::dropIfExists($id);

        if ($restaurant->image && Storage::disk('public')->exists($restaurant->image)) {
            Storage::disk('public')->delete($restaurant->image);
        }
        $restaurant->delete();

        return redirect()->route('admin.home')->with('success', 'restaurant deleted successfully.');
    }

}
