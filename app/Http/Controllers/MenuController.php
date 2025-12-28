<?php

namespace App\Http\Controllers;
use App\Models\Menu;
use App\Models\Restaurant;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
class MenuController extends Controller
{
    public function index($restaurantId)
    {
        $restaurant = Restaurant::with('menus')->findOrFail($restaurantId);
        return view('admin.edit_menu', compact('restaurant'));
    }

    public function update(Request $request, $restaurantId)
    {
        $data = $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'price' => 'required|numeric',
            'image' => 'nullable|image'
        ]);

        $data['restaurant_id'] = $restaurantId;

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('menus', 'public');
        }

        Menu::create($data);
        return back()->with('success','Menu item added');
    }
    public function destroy($id)
    {
        $menu = menu::findOrFail($id);

        if ($menu->image && Storage::disk('public')->exists($menu->image)) {
            Storage::disk('public')->delete($menu->image);
        }
        $menu->delete();

        return back()->with('success','Menu item deleted added');
    }
}
