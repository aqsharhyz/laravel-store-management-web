<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    protected $model;
    public function __construct()
    {
        $this->model = new Category();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json($this->model::all());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $categoryWithSameName = $this->model::where('name', $request->name)->first();
        if ($categoryWithSameName) {
            return response()->json(['message' => 'Category already exists'], 400);
        }

        $rules = [
            'name' => 'required|string|min:3',
            'description' => 'string'
        ];
        $validated = $request->validate($rules);

        $slug = Str::slug($validated['name']);
        $validated['slug'] = $slug;

        $category = $this->model::create($validated);

        return response()->json($category);
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return response()->json($category);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $categoryCheck = $this->model::where('id', $category->id)->first();
        if (!$category !== $categoryCheck->id) {
            return response()->json(['message' => 'Category not found'], 404);
        }

        $rules = [
            'name' => 'string|min:3',
            'description' => 'string'
        ];
        $validated = $request->validate($rules);

        if ($validated['name']) {
            $categoryWithSameName = $this->model::where('name', $validated['name'])->whereNotIn('id', [$category->id])->first();
            if ($categoryWithSameName) {
                return response()->json(['message' => 'Category already exists'], 400);
            }
        }
        $slug = Str::slug($validated['name']);
        $validated['slug'] = $slug;

        $category->update($validated);

        return response()->json($category);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
    }
}
