<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\Project;
use App\Models\Service;
use App\Models\Faq;

class AdminController extends Controller
{
    public function dashboard()
    {
        $stats = [
            'projects' => Project::count(),
            'services' => Service::count(),
            'faqs' => Faq::count(),
            'messages' => Message::count(),
            'unread_messages' => Message::where('is_read', false)->count(),
        ];
        return view('admin.dashboard', compact('stats'));
    }
}
