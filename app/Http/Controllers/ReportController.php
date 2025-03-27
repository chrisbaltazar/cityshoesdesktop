<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use Inertia\Inertia;

class ReportController extends Controller
{

    public function show(Sale $sale = null)
    {
        return Inertia::render('Report/Index', [
            'sales' => Sale::orderBy('created_at', 'desc')->get(),
            'details' => $sale?->details?->load('product')
        ]);
    }

}
