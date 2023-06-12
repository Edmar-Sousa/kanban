<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class PaymentController extends Controller
{
    public function index() 
    {
        return Inertia::render( 'Payment' );
    }


    public function payment( Request $request )
    {
        return response()->json( $request->all() );
    }
}
