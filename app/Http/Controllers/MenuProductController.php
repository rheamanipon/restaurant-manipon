<?php

namespace App\Http\Controllers;

use App\Models\MenuProduct;
use Illuminate\Http\Request;

class MenuProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(MenuProduct::all(), 200);
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
            'menu_id' => 'required|exists:menus,id',
            'product_id' => 'required|exists:products,id',
        ]);

        $menuProduct = MenuProduct::create($validated);
        return response()->json($menuProduct, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(MenuProduct $menuProduct)
    {
        return response()->json($menuProduct, 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MenuProduct $menuProduct)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MenuProduct $menuProduct)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MenuProduct $menuProduct)
    {
        //
    }
}
