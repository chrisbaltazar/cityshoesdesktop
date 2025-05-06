<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Native\Laravel\Facades\System;

class PrinterController extends Controller
{

    public function test()
    {
        $systemPrinters = System::printers();

        $devPrinters = [
            (object)['displayName' => 'Printer 1'],
            (object)['displayName' => 'Printer 2'],
        ];

        return Inertia::render('Printer/Test', [
                'printers' => $devPrinters
            ]
        );
    }

    public function print(Request $request, string $printerName)
    {
        $printer = collect(System::printers())->firstWhere('displayName', $printerName);

        if(!$printer) {
//            throw new \Exception('Printer not found');
        }

        System::print(view('printer.test')->render(), $printer);

        return view('printer.test');
    }
}
