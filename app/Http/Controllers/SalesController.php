<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaleRequest;
use App\Models\Enums\Sizes;
use App\Services\SalesManagerService;

class SalesController extends Controller
{

    public function index()
    {
        return inertia('Sales/Index', ['sizes' => Sizes::cases()]);
    }

    public function store(SaleRequest $request, SalesManagerService $salesManager)
    {
        try{
            $salesManager->create($request->validated());
        }catch (\Throwable){
            return back()->with([
                'message' => 'Error al registrar la venta',
                'type' => 'error'
            ]);
        }

        return back()->with([
            'message' => 'Venta registrada',
            'type' => 'success'
        ]);
    }
}
