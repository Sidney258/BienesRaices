<?php

namespace App\Http\Controllers;

use App\Models\property;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $properties = Property::where('status', '!=', 'sold')
            ->latest()
            ->take(3)
            ->get();
        return view('pages.index')->with('properties', $properties);
    }
}
