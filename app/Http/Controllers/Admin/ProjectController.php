<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\ProjectCategory;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::with('category')->orderBy('created_at', 'desc')->get();
        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        $categories = ProjectCategory::orderBy('name')->get();
        return view('admin.projects.form', ['project' => new Project, 'categories' => $categories]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:projects,slug',
            'description' => 'required|string',
            'category_id' => 'nullable|exists:project_categories,id',
            'client' => 'nullable|string|max:255',
            'url' => 'nullable|string|max:255',
            'status' => 'nullable|string|max:50',
            'is_featured' => 'boolean',
        ]);
        if (!$data['slug']) $data['slug'] = \Str::slug($data['title']);
        $data['is_featured'] = $request->boolean('is_featured');
        $data['status'] = $request->boolean('status');
        Project::create($data);
        return redirect()->route('admin.projects.index')->with('success', 'Proyek berhasil ditambahkan.');
    }

    public function edit(Project $project)
    {
        $categories = ProjectCategory::orderBy('name')->get();
        return view('admin.projects.form', compact('project', 'categories'));
    }

    public function update(Request $request, Project $project)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:projects,slug,' . $project->id,
            'description' => 'required|string',
            'category_id' => 'nullable|exists:project_categories,id',
            'client' => 'nullable|string|max:255',
            'url' => 'nullable|string|max:255',
            'status' => 'nullable|string|max:50',
            'is_featured' => 'boolean',
        ]);
        if (!$data['slug']) $data['slug'] = \Str::slug($data['title']);
        $data['is_featured'] = $request->boolean('is_featured');
        $data['status'] = $request->boolean('status');
        $project->update($data);
        return redirect()->route('admin.projects.index')->with('success', 'Proyek berhasil diperbarui.');
    }

    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('admin.projects.index')->with('success', 'Proyek berhasil dihapus.');
    }
}
