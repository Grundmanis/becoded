<?php
namespace Grundmanis\Becoded\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BecodedController extends Controller
{
    public function index(Request $request)
    {
        $errors = [];
        return view('becoded_view::dashboard', compact('errors'));
    }
}