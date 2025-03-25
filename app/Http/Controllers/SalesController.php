<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaleRequest;
use App\Models\Enums\Sizes;
use App\Services\SalesManagerService;
use Inertia\Inertia;

class SalesController extends Controller
{

    public function index()
    {
        return Inertia::render('Sales/Index', ['sizes' => Sizes::cases()]);
    }

    public function store(SaleRequest $request, SalesManagerService $salesManager)
    {
        try {
            $salesManager->create($request->validated());
        } catch (\Throwable $t) {
            return back()->withErrors('Error al registrar la venta: ' . $t->getMessage());
        }

        return back()->with('Venta guardada correctamente');
    }
}
