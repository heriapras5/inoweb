<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index(Request $request)
    {
        $clients = Client::when($request->get('search'), fn($q, $s) => $q->where('name', 'like', "%{$s}%"))
            ->orderBy('sort_order')->paginate(10)->withQueryString();
        return view('admin.clients.index', compact('clients'));
    }

    public function create()
    {
        return view('admin.clients.form', ['client' => new Client]);
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
            $path = $request->file('logo')->store('clients', 'public');
            $data['logo'] = 'storage/' . $path;
        }
        Client::create($data);
        return redirect()->route('admin.clients.index')->with('success', 'Klien berhasil ditambahkan.');
    }

    public function edit(Client $client)
    {
        return view('admin.clients.form', compact('client'));
    }

    public function update(Request $request, Client $client)
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
        if ($request->boolean('remove_logo') && $client->logo) {
            if (function_exists('deleteFile')) deleteFile($client->logo);
            $data['logo'] = null;
        }
        if ($request->hasFile('logo')) {
            if ($client->logo && function_exists('deleteFile')) deleteFile($client->logo);
            $path = $request->file('logo')->store('clients', 'public');
            $data['logo'] = 'storage/' . $path;
        }
        $client->update($data);
        return redirect()->route('admin.clients.index')->with('success', 'Klien berhasil diperbarui.');
    }

    public function destroy(Client $client)
    {
        if ($client->logo && function_exists('deleteFile')) deleteFile($client->logo);
        $client->delete();
        return redirect()->route('admin.clients.index')->with('success', 'Klien berhasil dihapus.');
    }
}
