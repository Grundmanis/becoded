<?php
namespace Grundmanis\Becoded\Controllers;

use Illuminate\Http\Request;

class BecodedController extends BaseController
{
    public function index(Request $request)
    {
        $errors = [];
        return view('becoded_view::dashboard', compact('errors'));
    }

}