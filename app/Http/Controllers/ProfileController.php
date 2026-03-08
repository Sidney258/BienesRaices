<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Property;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index(): View
    {
        $user = Auth::user();
        $properties = Property::where('user_id', $user->id)->get();

        return view('profile.index', [
            'user' => $user,
            'properties' => $properties
        ]);
    }
}
