<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AssasWebHookController extends Controller
{

    public function __invoke(Request $request)
    {
        return response('', 200);
    }

}
