<?php

namespace App\Http\Controllers;
use App\Models\Restaurant;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class Restaurants extends Controller
{
    public function index(Request $request)
    {
        $query = Restaurant::query();

        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%')
                ->orWhere('address', 'like', '%' . $request->search . '%');
        }

        $restaurants = $query->get();

        return view('home', compact('restaurants'));
    }


    public function show($id)
    {
        $restaurant = Restaurant::with('menus')->findOrFail($id);
        return view('restaurants.menu', compact('restaurant'));
    }

    public function adminHome()
    {
        abort_if(!auth()->check() || auth()->user()->role !== 'admin', 403);

        $restaurants = Restaurant::all();

        return view('Admin.admin_home', compact('restaurants'));
    }

    public function create(Request $request){
        $request->validate([
            'name'    => 'required|string|max:255',
            'phone'   => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
            'city'    => 'nullable|string|max:100',
            'country' => 'nullable|string|max:100',
            'image'   => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);
        $data = $request->all();



        $restaurant = restaurant::create($data);
        if ($request->hasFile('image')) {
            if ($restaurant->image && Storage::disk('public')->exists($restaurant->image)) {
                Storage::disk('public')->delete($restaurant->image);
            } $path = $request->file('image')->store('restaurants', 'public');
            $restaurant->image = $path; }
        $restaurant->save();
        if (!$restaurant) {
            return redirect(route('admin.home'))->with('error', 'Creation failed');
        }
        return redirect(route('admin.home'))->with('success', 'Creation successful');
    }

    public function edit($id)
    {
        $restaurant = Restaurant::findOrFail($id);
        return view('admin.edit', compact('restaurant'));
    }

    public function destroy($id)
    {
        $restaurant = Restaurant::findOrFail($id);

        if ($restaurant->image && Storage::disk('public')->exists($restaurant->image)) {
            Storage::disk('public')->delete($restaurant->image);
        }
        $restaurant->delete();

        return redirect()->route('admin.home')->with('success', 'restaurant deleted successfully.');
    }

    public function update(Request $request, $id)
    {
        $restaurant = Restaurant::findOrFail($id);

        $request->validate([
            'name'    => 'required|string|max:255',
            'description'    => 'nullable|string|max:255',
            'image'   => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'phone'   => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
        ]);

        $restaurant->name    = $request->name;
        $restaurant->phone   = $request->phone;
        $restaurant->address = $request->address;
        $restaurant->description = $request->description;


        if ($request->hasFile('image')) {
            if ($restaurant->image && Storage::disk('public')->exists($restaurant->image)) {
                Storage::disk('public')->delete($restaurant->image);
            }

            $path = $request->file('image')->store('restaurants', 'public');
            $restaurant->image = $path;
        }

        $restaurant->save();

        return redirect()->route('admin.home')
            ->with('success', 'Restaurant updated successfully.');
    }


}
