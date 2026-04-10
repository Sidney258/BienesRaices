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

    public function update(Request $request)
    {

        $user = Auth::user();
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255'
        ]);

        $user->update($data);

        return redirect()->route('profile')->with('success', 'perfil actualizado com sucesso');
    }
}
