<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\View\View;

class FavoriteController extends Controller
{
    public function toggle(Property $property)
    {
        auth()->user()->favorites()->toggle($property->id);

        return redirect()->back()->with('success', 'Favoritos actualizados com sucesso!');
    }

    public function index(): View
    {
        $favorites = auth()->user()->favorites()->paginate(6);

        return view('favorites.index')->with('favorites', $favorites);
    }
}
