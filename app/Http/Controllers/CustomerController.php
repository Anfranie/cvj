<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facade\DB;
use PDF;

class CustomerController extends Controller
{
    public function fun_pdf()
	{
		$pdf = PDF::loadView('invoice');
		return $pdf->download('invoice.pdf');
	}
}
