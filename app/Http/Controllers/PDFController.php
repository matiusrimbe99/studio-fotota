<?php

namespace App\Http\Controllers;

use Elibyy\TCPDF\Facades\TCPDF;
use Illuminate\Http\Request;

class PDFController extends Controller
{
    public function index(Request $request)
    {
        $filename = 'E-Tiket.pdf';

        $data = [
            'title' => 'E-Tiket',
        ];

        $html = view()->make('pdfSample', $data)->render();

        $pdf = new TCPDF;
        $pdf::SetTitle('E-Tiket');
        $pdf::AddPage();
        $pdf::writeHTML($html, true, false, true, false, '');

        return $pdf::Output(public_path($filename), 'I');

        // return response()->download(public_path($filename));
    }
}
