<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\ProjectCategory;
use App\Models\ProjectImage;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search');
        $categoryId = $request->get('category_id');
        $projects = Project::with('category', 'images')
            ->when($search, fn($q) => $q->where('name', 'like', "%{$search}%"))
            ->when($categoryId, fn($q) => $q->where('category_id', $categoryId))
            ->orderBy('created_at', 'desc')->paginate(10);
        $categories = ProjectCategory::orderBy('name')->get();
        return view('admin.projects.index', compact('projects', 'categories'));
    }

    public function create()
    {
        $categories = ProjectCategory::orderBy('name')->get();
        return view('admin.projects.form', ['project' => new Project, 'categories' => $categories]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'category_id' => 'nullable|exists:project_categories,id',
            'main_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'gallery_images' => 'nullable|array',
            'gallery_images.*' => 'image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);
        $data['slug'] = \Str::slug($data['name']);
        $data['status'] = true;
        $project = Project::create($data);

        if ($request->hasFile('main_image')) {
            $path = $request->file('main_image')->store('projects', 'public');
            $project->images()->create([
                'image' => 'storage/' . $path,
                'type' => 'cover',
                'sort_order' => 0,
            ]);
        }

        if ($request->hasFile('gallery_images')) {
            foreach ($request->file('gallery_images') as $i => $file) {
                $path = $file->store('projects', 'public');
                $project->images()->create([
                    'image' => 'storage/' . $path,
                    'type' => 'gallery',
                    'sort_order' => $i + 1,
                ]);
            }
        }

        return redirect()->route('admin.projects.index')->with('success', 'Proyek berhasil ditambahkan.');
    }

    public function edit(Project $project)
    {
        $categories = ProjectCategory::orderBy('name')->get();
        $project->load('images');
        return view('admin.projects.form', compact('project', 'categories'));
    }

    public function update(Request $request, Project $project)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'category_id' => 'nullable|exists:project_categories,id',
            'main_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'gallery_images' => 'nullable|array',
            'gallery_images.*' => 'image|mimes:jpeg,png,jpg,webp|max:2048',
            'deleted_images' => 'nullable|array',
            'deleted_images.*' => 'integer|exists:project_images,id',
        ]);
        $data['slug'] = \Str::slug($data['name']);
        $project->update($data);

        if ($request->has('deleted_images')) {
            $images = ProjectImage::whereIn('id', $request->input('deleted_images'))->get();
            foreach ($images as $img) {
                deleteFile($img->image);
                $img->delete();
            }
        }

        if ($request->hasFile('main_image')) {
            $project->images()->where('type', 'cover')->each(function($img) { deleteFile($img->image); $img->delete(); });
            $path = $request->file('main_image')->store('projects', 'public');
            $project->images()->create([
                'image' => 'storage/' . $path,
                'type' => 'cover',
                'sort_order' => 0,
            ]);
        }

        if ($request->hasFile('gallery_images')) {
            $maxSort = $project->images()->max('sort_order') ?? 0;
            foreach ($request->file('gallery_images') as $i => $file) {
                $path = $file->store('projects', 'public');
                $project->images()->create([
                    'image' => 'storage/' . $path,
                    'type' => 'gallery',
                    'sort_order' => $maxSort + $i + 1,
                ]);
            }
        }

        return redirect()->route('admin.projects.index')->with('success', 'Proyek berhasil diperbarui.');
    }

    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('admin.projects.index')->with('success', 'Proyek berhasil dihapus.');
    }
}
