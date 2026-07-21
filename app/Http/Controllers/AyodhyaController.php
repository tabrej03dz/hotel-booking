<?php

namespace App\Http\Controllers;

use App\Models\AyodhyaPlace;
use Illuminate\View\View;

class AyodhyaController extends Controller
{
    public function index(): View
    {
        $places = AyodhyaPlace::query()
            ->where('status', true)
            ->orderBy('sort_order')
            ->orderBy('name')
            ->get();

        return view('explore-ayodhya', compact('places'));
    }

    public function show(AyodhyaPlace $place): View
    {
        abort_unless($place->status, 404);

        $relatedPlaces = AyodhyaPlace::query()
            ->where('status', true)
            ->whereKeyNot($place->id)
            ->when($place->category, fn ($query) => $query->where('category', $place->category))
            ->orderBy('sort_order')
            ->limit(4)
            ->get();

        if ($relatedPlaces->isEmpty()) {
            $relatedPlaces = AyodhyaPlace::query()
                ->where('status', true)
                ->whereKeyNot($place->id)
                ->orderBy('sort_order')
                ->limit(4)
                ->get();
        }

        return view('ayodhya-places.place-details', compact('place', 'relatedPlaces'));
    }
}
