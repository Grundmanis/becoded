<?php
namespace Grundmanis\Becoded\Controllers;

use Grundmanis\Becoded\Models\BecodedUser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;

class PageController extends BaseController
{

    public function getPages(Request $request)
    {
        $routes = Route::getRoutes();
        return view('becoded_view::pages.index', ['routes' => $routes]);
    }

    public function postPages(Request $request)
    {


        if ($request->in_menu) {

//            $route = DB::table('becoded_pages')
//                ->where('uri','=',$request->uri)
//                ->get();
//
//            if (!$route) {
//                // Create page and set in menu
//                DB::table('becoded_pages')
//                    ->insert([
//                        'uri' => $request->uri,
//                        'middleware' => $request->middleware,
//                        'controller' => $request->controller,
//                        'as' => $request->as,
//                        'in_menu' => 1,
//                    ]);
//            } else {
//                // change in menu
//                $route->in_menu = $request->setInMenu;
//                $route->update();
//            }
            
            

            DB::table('becoded_logs')->insert(
                [
                    'text' => 'Updated menu',
                    'icon' => 'menu',
                ]
            );
        }
        else if ($request->change_tag) {


            DB::table('becoded_logs')->insert(
                [
                    'text' => 'Updated menu',
                    'icon' => 'menu',
                ]
            );
        } else {

        }
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