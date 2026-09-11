<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CtaSection;
use Illuminate\Http\Request;

class CtaSectionController extends Controller
{
    public function index()
    {
        $sections = CtaSection::orderBy('id', 'desc')->paginate(10);
        return view('admin.cta-sections.index', compact('sections'));
    }

    public function create()
    {
        return view('admin.cta-sections.form', ['section' => new CtaSection]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'button_text' => 'nullable|string|max:255',
            'button_url' => 'nullable|string|max:255',
            'is_active' => 'boolean',
        ]);
        $data['is_active'] = $request->boolean('is_active', true);
        CtaSection::create($data);
        return redirect()->route('admin.cta-sections.index')->with('success', 'CTA berhasil ditambahkan.');
    }

    public function edit(CtaSection $ctaSection)
    {
        $section = $ctaSection;
        return view('admin.cta-sections.form', compact('section'));
    }

    public function update(Request $request, CtaSection $ctaSection)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'button_text' => 'nullable|string|max:255',
            'button_url' => 'nullable|string|max:255',
            'is_active' => 'boolean',
        ]);
        $data['is_active'] = $request->boolean('is_active');
        $ctaSection->update($data);
        return redirect()->route('admin.cta-sections.index')->with('success', 'CTA berhasil diperbarui.');
    }

    public function destroy(CtaSection $ctaSection)
    {
        $ctaSection->delete();
        return redirect()->route('admin.cta-sections.index')->with('success', 'CTA dihapus.');
    }
}
