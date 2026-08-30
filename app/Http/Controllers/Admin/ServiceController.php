<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search');
        $services = Service::when($search, fn($q) => $q->where('title', 'like', "%{$search}%"))
            ->orderBy('sort_order')->paginate(10);
        return view('admin.services.index', compact('services'));
    }

    public function create()
    {
        return view('admin.services.form', ['service' => new Service]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'icon' => 'required|string|max:255',
            'description' => 'required|string',
            'features' => 'nullable|array',
            'features.*' => 'string|max:255',
            'sort_order' => 'nullable|integer|min:0',
            'status' => 'boolean',
        ]);
        $data['status'] = $request->boolean('status');
        $data['slug'] = $this->generateUniqueSlug($data['title']);
        $data['features'] = $data['features'] ?? [];
        Service::create($data);
        return redirect()->route('admin.services.index')->with('success', 'Layanan berhasil ditambahkan.');
    }

    public function edit(Service $service)
    {
        return view('admin.services.form', compact('service'));
    }

    public function update(Request $request, Service $service)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'icon' => 'required|string|max:255',
            'description' => 'required|string',
            'features' => 'nullable|array',
            'features.*' => 'string|max:255',
            'sort_order' => 'nullable|integer|min:0',
            'status' => 'boolean',
        ]);
        $data['status'] = $request->boolean('status');
        $data['slug'] = $this->generateUniqueSlug($data['title'], $service->id);
        $data['features'] = $data['features'] ?? [];
        $service->update($data);
        return redirect()->route('admin.services.index')->with('success', 'Layanan berhasil diperbarui.');
    }

    public function destroy(Service $service)
    {
        $service->delete();
        return redirect()->route('admin.services.index')->with('success', 'Layanan berhasil dihapus.');
    }

    protected function generateUniqueSlug(string $title, ?int $ignoreId = null): string
    {
        $slug = \Illuminate\Support\Str::slug($title);
        if (empty($slug)) $slug = 'layanan';
        $base = $slug;
        $counter = 2;
        while (true) {
            $query = \App\Models\Service::where('slug', $slug);
            if ($ignoreId) $query->where('id', '!=', $ignoreId);
            if (!$query->exists()) break;
            $slug = $base . '-' . $counter++;
        }
        return $slug;
    }
}
