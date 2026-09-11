<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactInfo;
use Illuminate\Http\Request;

class ContactInfoController extends Controller
{
    public function index()
    {
        $items = ContactInfo::orderBy('sort_order')->paginate(15);
        return view('admin.contact-info.index', compact('items'));
    }

    public function create()
    {
        return view('admin.contact-info.form', ['item' => new ContactInfo]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'type' => 'required|string|max:50',
            'label' => 'required|string|max:255',
            'value' => 'required|string|max:1000',
            'icon' => 'nullable|string|max:255',
            'sort_order' => 'nullable|integer|min:0',
            'status' => 'boolean',
        ]);
        $data['status'] = $request->boolean('status', true);
        ContactInfo::create($data);
        return redirect()->route('admin.contact-info.index')->with('success', 'Info kontak ditambahkan.');
    }

    public function edit(ContactInfo $contactInfo)
    {
        $item = $contactInfo;
        return view('admin.contact-info.form', compact('item'));
    }

    public function update(Request $request, ContactInfo $contactInfo)
    {
        $data = $request->validate([
            'type' => 'required|string|max:50',
            'label' => 'required|string|max:255',
            'value' => 'required|string|max:1000',
            'icon' => 'nullable|string|max:255',
            'sort_order' => 'nullable|integer|min:0',
            'status' => 'boolean',
        ]);
        $data['status'] = $request->boolean('status');
        $contactInfo->update($data);
        return redirect()->route('admin.contact-info.index')->with('success', 'Info kontak diperbarui.');
    }

    public function destroy(ContactInfo $contactInfo)
    {
        $contactInfo->delete();
        return redirect()->route('admin.contact-info.index')->with('success', 'Info kontak dihapus.');
    }
}
