<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\property;
use Illuminate\View\View;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class PropertyController extends Controller
{
    use AuthorizesRequests;

    public function index(): View
    {
        $properties = Property::paginate(6);
        return view('properties.index')->with('properties', $properties);
    }

    public function create(): View
    {
        return view('properties.create');
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'status' => 'required|in:sale,rent,sold',
            'type' => 'required|in:house,apartment,land,room',
            'bedrooms' => 'nullable|integer',
            'bathrooms' => 'nullable|integer',
            'parking_spaces' => 'nullable|integer',
            'address' => 'nullable|string|max:255',
            'city' => 'required|string|max:255',
            'state' => 'nullable|string|max:255',
            'contact' => 'required|string|max:12',
            'image' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048',
        ]);

        $validate['user_id'] = auth()->user()->id;
        $validate['country'] = 'Mocambique';

        // handle file upload
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('images', 'public');
            $validate['image'] = $path;
        }

        Property::create($validate);

        return redirect()->route('home')->with('success', 'propriedade adicionada com sucesso');
    }

    public function show(Property $property): View
    {
        return view('properties.show')->with('property', $property);
    }

    public function destroy(Property $property)
    {
        // check if user is authorized
        $this->authorize('delete', $property);
        if ($property->image) {
            Storage::delete('public/images' . $property->image);
        }

        $property->delete();

        return redirect()->route('profile')->with('success', 'propriedade removida com sucesso!');
    }

    public function update(Request $request, Property $property): RedirectResponse
    {
        $this->authorize('update', $property);
        $validate = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'status' => 'required|in:sale,rent,sold',
            'type' => 'required|in:house,apartment,land,room',
            'bedrooms' => 'nullable|integer',
            'bathrooms' => 'nullable|integer',
            'parking_spaces' => 'nullable|integer',
            'address' => 'nullable|string|max:255',
            'city' => 'required|string|max:255',
            'state' => 'nullable|string|max:255',
            'contact' => 'required|string|max:12',
            'image' => 'image|mimes:jpeg,png,jpg,svg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            // primeiro temos de eliminar a imagem antiga pra adicionarmos uma nova
            Storage::delete('public/images/' . basename($property->image));

            $path = $request->file('image')->store('images', 'public');
            $validate['image'] = $path;
        }

        $property->update($validate);

        return redirect()->route('home')->with('success', 'propriedade actualizada com sucesso');
    }

    public function edit(Property $property): View
    {
        $this->authorize('update', $property);
        return view('properties.edit')->with('property', $property);
    }

    public function search(Request $request)
    {
        $keywords = strtolower($request->input('keywords'));
        $location = strtolower($request->input('location'));
        $type = strtolower($request->input('type'));

        $query = Property::query();

        if ($keywords) {
            $query->where(function ($q) use ($keywords) {
                $q->whereRaw('LOWER(title) like ?', ['%' . $keywords . '%'])
                    ->orWhereRaw('LOWER(description) like ?', ['%' . $keywords . '%'])
                    ->orWhereRaw('LOWER(address) like ?', ['%' . $keywords . '%'])
                    ->orWhereRaw('LOWER(status) like ?', ['%' . $keywords . '%'])
                    ->orWhereRaw('LOWER(country) like ?', ['%' . $keywords . '%']);
            });
        }
        if ($location) {
            $query->where(function ($q) use ($location) {
                $q->whereRaw('LOWER(address) like ?', ['%' . $location . '%'])
                    ->orWhereRaw('LOWER(city) like ?', ['%' . $location . '%'])
                    ->orWhereRaw('LOWER(state) like ?', ['%' . $location . '%']);
            });
        }
        if ($type) {
            $query->where(function ($q) use ($type) {
                $q->whereRaw('LOWER(type) like ?', ['%' . $type . '%']);
            });
        }

        $properties = $query->paginate(3);

        return view('properties.index')->with('properties', $properties);
    }
}
