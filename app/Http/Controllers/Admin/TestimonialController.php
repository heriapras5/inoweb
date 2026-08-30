<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search');
        $testimonials = Testimonial::when($search, fn($q) => $q->where('name', 'like', "%{$search}%"))
            ->orderBy('sort_order')->paginate(10);
        return view('admin.testimonials.index', compact('testimonials'));
    }

    public function create()
    {
        return view('admin.testimonials.form', ['testimonial' => new Testimonial]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'role' => 'nullable|string|max:255',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'quote' => 'required|string',
            'rating' => 'nullable|integer|min:1|max:5',
            'sort_order' => 'nullable|integer|min:0',
            'status' => 'boolean',
        ]);
        $data['status'] = $request->boolean('status');
        if ($request->hasFile('avatar')) {
            $path = $request->file('avatar')->store('testimonials', 'public');
            $data['avatar'] = 'storage/' . $path;
            optimizeImage($data['avatar']);
        }
        Testimonial::create($data);
        return redirect()->route('admin.testimonials.index')->with('success', 'Testimoni berhasil ditambahkan.');
    }

    public function edit(Testimonial $testimonial)
    {
        return view('admin.testimonials.form', compact('testimonial'));
    }

    public function update(Request $request, Testimonial $testimonial)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'role' => 'nullable|string|max:255',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'remove_avatar' => 'nullable|boolean',
            'quote' => 'required|string',
            'rating' => 'nullable|integer|min:1|max:5',
            'sort_order' => 'nullable|integer|min:0',
            'status' => 'boolean',
        ]);
        $data['status'] = $request->boolean('status');
        if ($request->boolean('remove_avatar')) {
            deleteFile($testimonial->avatar);
            $data['avatar'] = null;
        } elseif ($request->hasFile('avatar')) {
            deleteFile($testimonial->avatar);
            $path = $request->file('avatar')->store('testimonials', 'public');
            $data['avatar'] = 'storage/' . $path;
            optimizeImage($data['avatar']);
        } else {
            unset($data['avatar']);
        }
        $testimonial->update($data);
        return redirect()->route('admin.testimonials.index')->with('success', 'Testimoni berhasil diperbarui.');
    }

    public function destroy(Testimonial $testimonial)
    {
        deleteFile($testimonial->avatar);
        $testimonial->delete();
        return redirect()->route('admin.testimonials.index')->with('success', 'Testimoni berhasil dihapus.');
    }
}
