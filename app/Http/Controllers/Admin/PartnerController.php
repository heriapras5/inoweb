<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    public function index(Request $request)
    {
        $partners = Partner::when($request->get('search'), fn($q, $s) => $q->where('name', 'like', "%{$s}%"))
            ->orderBy('sort_order')->paginate(10)->withQueryString();
        return view('admin.partners.index', compact('partners'));
    }

    public function create()
    {
        return view('admin.partners.form', ['partner' => new Partner]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,webp,svg|max:2048',
            'url' => 'nullable|string|max:255',
            'sort_order' => 'nullable|integer|min:0',
            'status' => 'boolean',
        ]);
        $data['status'] = $request->boolean('status', true);
        if ($request->hasFile('logo')) {
            $path = $request->file('logo')->store('partners', 'public');
            $data['logo'] = 'storage/' . $path;
        }
        Partner::create($data);
        return redirect()->route('admin.partners.index')->with('success', 'Partner berhasil ditambahkan.');
    }

    public function edit(Partner $partner)
    {
        return view('admin.partners.form', compact('partner'));
    }

    public function update(Request $request, Partner $partner)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,webp,svg|max:2048',
            'url' => 'nullable|string|max:255',
            'sort_order' => 'nullable|integer|min:0',
            'status' => 'boolean',
            'remove_logo' => 'boolean',
        ]);
        $data['status'] = $request->boolean('status');
        if ($request->boolean('remove_logo') && $partner->logo) {
            if (function_exists('deleteFile')) deleteFile($partner->logo);
            $data['logo'] = null;
        }
        if ($request->hasFile('logo')) {
            if ($partner->logo && function_exists('deleteFile')) deleteFile($partner->logo);
            $path = $request->file('logo')->store('partners', 'public');
            $data['logo'] = 'storage/' . $path;
        }
        $partner->update($data);
        return redirect()->route('admin.partners.index')->with('success', 'Partner berhasil diperbarui.');
    }

    public function destroy(Partner $partner)
    {
        if ($partner->logo && function_exists('deleteFile')) deleteFile($partner->logo);
        $partner->delete();
        return redirect()->route('admin.partners.index')->with('success', 'Partner berhasil dihapus.');
    }
}
