<?php

namespace App\Http\Controllers;

use App\Models\MenuProduct;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

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
    $validated = $request->validate([
        'menu_id' => ['required', 'exists:menus,id'],
        'product_id' => [
            'required',
            'exists:products,id',
            Rule::unique('menu_products')->where(function ($query) use ($request) {
                return $query->where('menu_id', $request->menu_id);
            }),
        ],
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
         $validated = $request->validate([
        'menu_id' => ['required', 'exists:menus,id'],
        'product_id' => [
            'required',
            'exists:products,id',
            Rule::unique('menu_products')->where(function ($query) use ($request) {
                return $query->where('menu_id', $request->menu_id);
            }),
        ],
    ]);

        $menuProduct->update($validated);
        return response()->json($menuProduct, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MenuProduct $menuProduct)
    {
        $menuProduct->delete();
        return response()->json(['message' => 'Menu-Product deleted successfully'],200);
    }
}
