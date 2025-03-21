<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaleRequest;
use App\Models\ValueObjects\Sizes;
use Illuminate\Http\Request;

class SalesController extends Controller
{

    public function index()
    {
        return inertia('Sales/Index', ['sizes' => Sizes::cases()]);
    }

    public function store(SaleRequest $request)
    {



        return back()->with([
            'message' => 'Venta registrada',
            'type' => 'success'
        ]);
    }
}
