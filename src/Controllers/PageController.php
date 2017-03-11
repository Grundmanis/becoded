<?php
namespace Grundmanis\Becoded\Controllers;

use Grundmanis\Becoded\Models\BecodedUser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;

class PageController extends Controller
{

    public function getPages(Request $request)
    {
        $routes = Route::getRoutes();
        return view('becoded_view::pages.index', ['routes' => $routes]);
    }

    public function getAddPage(Request $request)
    {
        $pages = BecodedUser::all();
        return view('becoded_view::pages.add', ['pages' => $pages]);
    }

    public function postAddPage(Request $request)
    {

        $user = new BecodedUser();
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->name = $request->name;
        $user->save();
        return redirect()->route('becoded.pages');

    }

    public function getDeletePage(Request $request, $id)
    {

        $user = BecodedUser::find($id);
        $user->delete();

        return redirect()->route('becoded.pages');

    }

    public function getEditPage(Request $request, $id)
    {

        $user = BecodedUser::find($id);
        return view('becoded_view::pages.edit', ['user' => $user]);

    }

    public function postEditPage(Request $request, $id)
    {

        $user = BecodedUser::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->password) {
            $user->password = bcrypt($request->password);
        }
        $user->update();
        return redirect()->route('becoded.pages');

    }


}