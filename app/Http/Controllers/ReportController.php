<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ReportController extends Controller
{

    public function index()
    {
        return Inertia::render('Report/Index', [
            'sales' => Sale::orderBy('created_at', 'desc')->get()
        ]);
    }
}
