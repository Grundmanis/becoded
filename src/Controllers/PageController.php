<?php
namespace Grundmanis\Becoded\Controllers;

use Grundmanis\Becoded\Models\BecodedUser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;

class PageController extends BaseController
{

    public function getPages(Request $request)
    {
        $routes = Route::getRoutes();
        $pages = DB::table('becoded_pages')->get();
        $in_menu = [];
        foreach ($pages as $page) {
            $in_menu[$page->uri] = $page;
        }
        return view('becoded_view::pages.index', ['routes' => $routes, 'in_menu' => $in_menu]);
    }

    public function postPages(Request $request)
    {

        $result = [
            'result' => 0,
            'response' => 'Could not save'
        ];

        if ($request->in_menu) {

            $route = DB::table('becoded_pages')
                ->where('uri','=',$request->uri)
                ->get();

            if (!count($route)) {
                // Create page and set in menu
                DB::table('becoded_pages')
                    ->insert([
                        'uri' => $request->uri,
                        'middleware' => $request->middleware,
                        'controller' => $request->controller,
                        'as' => $request->as,
                        'in_menu' => 1,
                    ]);

                DB::table('becoded_logs')->insert(
                    [
                        'text' => 'Page added in menu: ' . $request->uri ,
                        'icon' => 'menu',
                    ]
                );

                $result['result'] = 1;
                $result['response'] = 'Page added in menu';

            } else {

                DB::table('becoded_pages')
                    ->where('uri','=',$request->uri)
                    ->update(['in_menu' => !$route[0]->in_menu]);

                DB::table('becoded_logs')->insert(
                    [
                        'text' => 'Page delete from menu: ' . $request->uri ,
                        'icon' => 'menu',
                    ]
                );
                $result['result'] = 1;
                $result['response'] = 'Page deleted from menu';
            }

        }
        else if ($request->change_tag) {

            $route = DB::table('becoded_pages')
                ->where('uri','=',$request->uri)
                ->get();

            if (!count($route)) {
                // Create page and set in menu
                DB::table('becoded_pages')
                    ->insert([
                        'uri' => $request->uri,
                        'middleware' => $request->middleware,
                        'controller' => $request->controller,
                        'as' => $request->as,
                        'tag' => $request->tag,
                    ]);

                DB::table('becoded_logs')->insert(
                    [
                        'text' => 'Page ' . $request->uri . ' added with tag: ' . $request->tag ,
                        'icon' => 'menu',
                    ]
                );

            } else {
                DB::table('becoded_pages')
                    ->where('uri','=',$request->uri)
                    ->update(['tag' => $request->tag]);

                DB::table('becoded_logs')->insert(
                    [
                        'text' => $request->tag ? 'Page ' . $request->uri . ' updated with tag: ' . $request->tag : 'Tag removed for ' . $request->uri . ' page',
                        'icon' => 'menu',
                    ]
                );

            }

            $result['result'] = 1;
            $result['response'] = 'Page tagged successfully';

        } else {
            $result['result'] = 0;
            $result['response'] = 'Couldn\'t save';
        }

        header('Content-Type: application/json');
        echo json_encode($result, JSON_OBJECT_AS_ARRAY);
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