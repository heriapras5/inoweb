<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MenuController extends Controller
{
    public function index()
    {
        $menus = Menu::with('parent')->orderBy('sort_order')->paginate(15);
        return view('admin.menus.index', compact('menus'));
    }

    public function create()
    {
        $parents = Menu::whereNull('parent_id')->orderBy('name')->get();
        return view('admin.menus.form', ['menu' => new Menu, 'parents' => $parents]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'url' => 'nullable|string|max:255',
            'icon' => 'nullable|string|max:255',
            'parent_id' => 'nullable|exists:menus,id',
            'sort_order' => 'nullable|integer|min:0',
            'status' => 'boolean',
        ]);
        $data['status'] = $request->boolean('status', true);
        $data['slug'] = Str::slug($data['name']);
        Menu::create($data);
        return redirect()->route('admin.menus.index')->with('success', 'Menu berhasil ditambahkan.');
    }

    public function edit(Menu $menu)
    {
        $parents = Menu::whereNull('parent_id')->where('id', '!=', $menu->id)->orderBy('name')->get();
        return view('admin.menus.form', compact('menu', 'parents'));
    }

    public function update(Request $request, Menu $menu)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'url' => 'nullable|string|max:255',
            'icon' => 'nullable|string|max:255',
            'parent_id' => 'nullable|exists:menus,id',
            'sort_order' => 'nullable|integer|min:0',
            'status' => 'boolean',
        ]);
        $data['status'] = $request->boolean('status');
        $data['slug'] = Str::slug($data['name']);
        $menu->update($data);
        return redirect()->route('admin.menus.index')->with('success', 'Menu berhasil diperbarui.');
    }

    public function destroy(Menu $menu)
    {
        $menu->children()->update(['parent_id' => null]);
        $menu->delete();
        return redirect()->route('admin.menus.index')->with('success', 'Menu dihapus.');
    }
}
