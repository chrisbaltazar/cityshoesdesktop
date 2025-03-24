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
            $sale = $salesManager->create($request->validated());
            dd($sale);
        } catch (\Throwable $t) {
            $message = 'Error al registrar la venta: ' . $t->getMessage();
            $type = 'error';
        }

        return back()->with([
            'message' => $message ?? 'Venta guardada',
            'type' => $type ?? 'success'
        ]);
    }
}
