<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Menu::all(), 200);
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
        $validated = request()->validate([
            'name' => 'required|string|max:128|unique:menus,name',
        ]);

        $menu = Menu::create($validated);
        return response()->json($menu, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Menu $menu)
    {
        return response()->json($menu, 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Menu $menu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Menu $menu)
    {
        $validated = request()->validate([
            'name' => 'required|string|max:128|unique:menus,name,' . $menu->id,
        ]);

        $menu->update($validated);
        return response()->json($menu, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Menu $menu)
    {
        $menu->delete();
        return response()->json(['message' => 'Menu deleted successfully'], 200);
    }
}
