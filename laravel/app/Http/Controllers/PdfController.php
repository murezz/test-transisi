<?php

namespace App\Http\Controllers;

use App\Models\Employees;
use Illuminate\Http\Request;
use PDF;

class PdfController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    public function print()
    {
        $employees = Employees::get();
        $pdf = PDF::loadview('employees.show', ['employees' => $employees])->setOptions(['defaultFont' => 'sans-serif']);
        return $pdf->stream();
    }
}
