<?php

namespace App\Http\Controllers;

use App\Models\ValueObjects\Sizes;
use Illuminate\Http\Request;

class SalesController extends Controller
{

    public function index()
    {
        return inertia('Sales/Index', ['sizes' => Sizes::cases()]);
    }

}
