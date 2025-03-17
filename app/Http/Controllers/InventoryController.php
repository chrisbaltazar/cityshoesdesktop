<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Inertia\Inertia;

class InventoryController extends Controller
{

    public function index()
    {
        return Inertia::render('Inventory/Index', [
            'products' => Product::orderBy('name')->get(),
        ]);
    }

}
