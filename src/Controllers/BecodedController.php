<?php
namespace Grundmanis\Becoded\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class BecodedController extends Controller
{
    public function index(Request $request)
    {
        $errors = [];
        return view('becoded::index', compact('errors'));
    }
    public function postSignin(Request $request)
    {
        dump($request);
    }
}