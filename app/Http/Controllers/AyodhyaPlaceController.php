<?php

namespace App\Http\Controllers;

use App\Models\AyodhyaPlace;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;

class AyodhyaPlaceController extends Controller
{
    public function index(): View
    {
        $places = AyodhyaPlace::query()->orderBy('sort_order')->orderByDesc('id')->paginate(20);
        return view('ayodhya-places.index', compact('places'));
    }

    public function create(): View
    {
        return view('ayodhya-places.form', ['place' => new AyodhyaPlace()]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validated($request);
        $data['slug'] = $this->uniqueSlug($data['name']);
        $data['status'] = $request->boolean('status');

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('ayodhya-places', 'public');
        }

        AyodhyaPlace::create($data);

        return redirect()->route('ayodhya-places.index')->with('success', 'Place created successfully.');
    }

    public function edit(AyodhyaPlace $ayodhyaPlace): View
    {
        return view('ayodhya-places.form', ['place' => $ayodhyaPlace]);
    }

    public function update(Request $request, AyodhyaPlace $ayodhyaPlace): RedirectResponse
    {
        $data = $this->validated($request);
        $data['slug'] = $this->uniqueSlug($data['name'], $ayodhyaPlace->id);
        $data['status'] = $request->boolean('status');

        if ($request->hasFile('image')) {
            if ($ayodhyaPlace->image && !str_starts_with($ayodhyaPlace->image, 'http')) {
                Storage::disk('public')->delete($ayodhyaPlace->image);
            }
            $data['image'] = $request->file('image')->store('ayodhya-places', 'public');
        }

        $ayodhyaPlace->update($data);

        return redirect()->route('ayodhya-places.index')->with('success', 'Place updated successfully.');
    }

    public function destroy(AyodhyaPlace $ayodhyaPlace): RedirectResponse
    {
        if ($ayodhyaPlace->image && !str_starts_with($ayodhyaPlace->image, 'http')) {
            Storage::disk('public')->delete($ayodhyaPlace->image);
        }

        $ayodhyaPlace->delete();
        return back()->with('success', 'Place deleted successfully.');
    }

    private function validated(Request $request): array
    {
        return $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'category' => ['nullable', 'string', 'max:100'],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:5120'],
            'short_description' => ['required', 'string', 'max:500'],
            'description' => ['required', 'string'],
            'location' => ['nullable', 'string', 'max:255'],
            'timing' => ['nullable', 'string', 'max:255'],
            'entry_fee' => ['nullable', 'string', 'max:255'],
            'map_url' => ['nullable', 'url', 'max:1000'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'status' => ['nullable', 'boolean'],
        ]);
    }

    private function uniqueSlug(string $name, ?int $ignoreId = null): string
    {
        $base = Str::slug($name) ?: 'place';
        $slug = $base;
        $counter = 2;

        while (AyodhyaPlace::query()
            ->where('slug', $slug)
            ->when($ignoreId, fn ($query) => $query->whereKeyNot($ignoreId))
            ->exists()) {
            $slug = $base . '-' . $counter++;
        }

        return $slug;
    }
}
