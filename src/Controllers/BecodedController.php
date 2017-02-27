<?php
namespace Grundmanis\Becoded\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class BecodedController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('weight') && $request->has('high')) {
            $weight = $request->get('weight');
            $high = $request->get('high');
            $becoded = round($weight / ($high * $high),1);
        }
        return view('becoded::index', compact('becoded'));
    }
}