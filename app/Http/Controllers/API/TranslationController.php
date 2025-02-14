<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Translation;


class TranslationController extends Controller
{
   
    public function index(Request $request)
    {
        $query = Translation::query();

        if ($request->has('locale')) {
            $query->where('locale', $request->locale);
        }
        if ($request->has('tags')) {
            $query->whereJsonContains('tags', $request->tags);
        }
        if ($request->has('key')) {
            $query->where('key', 'like', "%{$request->key}%");
        }
        if ($request->has('content')) {
            $query->where('content', 'like', "%{$request->content}%");
        }

        return response()->json($query->paginate(50));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'key' => 'required|string',
            'content' => 'required|string',
            'locale' => 'required|string',
            'tags' => 'nullable|array',
        ]);

        $translation = Translation::create($validated);
        return response()->json($translation, 201);
    }

    public function update(Request $request, $id)
    {
        $translation = Translation::findOrFail($id);
        $validated = $request->validate([
            'key' => 'sometimes|string',
            'content' => 'sometimes|string',
            'locale' => 'sometimes|string',
            'tags' => 'nullable|array',
        ]);

        $translation->update($validated);
        return response()->json($translation);
    }

    public function export()
    {
        $translations = Cache::remember('translations_export', 60, function () {
            return Translation::all()->groupBy('locale');
        });

        return response()->json($translations);
    }
}
