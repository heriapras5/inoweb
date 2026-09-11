<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PageView;
use Illuminate\Http\Request;

class TrafficController extends Controller
{
    public function index(Request $request)
    {
        $traffics = PageView::when($request->get('search'), function ($q, $s) {
            $q->where('page_url', 'like', "%{$s}%")->orWhere('ip_address', 'like', "%{$s}%");
        })
            ->latest()
            ->paginate(25)
            ->withQueryString();

        $visitors = PageView::selectRaw('DATE(created_at) as date, COUNT(DISTINCT ip_address) as total')
            ->groupBy('date')
            ->orderByDesc('date')
            ->take(7)
            ->get();

        return view('admin.traffics.index', compact('traffics', 'visitors'));
    }

    public function destroy(PageView $traffic)
    {
        $traffic->delete();
        return redirect()->route('admin.traffics.index')->with('success', 'Data traffic dihapus.');
    }
}
