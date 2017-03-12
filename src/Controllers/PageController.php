<?php
namespace Grundmanis\Becoded\Controllers;

use Grundmanis\Becoded\Models\BecodedPage;
use Grundmanis\Becoded\Models\BecodedUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

class PageController extends BaseController
{

    public function getCustomPage($slug = null) {
        $page = BecodedPage::where('route', $slug)->where('active', 1);
        $page = $page->firstOrFail();
        return view($page->template)->with('page', $page);
    }
    
    public function getPages()
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

        }
        else if ($request->set_active) {
            $route = DB::table('becoded_pages')
                ->where('uri','=',$request->uri)
                ->get();

            if (!count($route)) {
                // Create page and set active
                DB::table('becoded_pages')
                    ->insert([
                        'uri' => $request->uri,
                        'middleware' => $request->middleware,
                        'controller' => $request->controller,
                        'as' => $request->as,
                        'active' => $request->active == 'true' ? 1 : 0,
                        'tag' => $request->tag,
                    ]);

                DB::table('becoded_logs')->insert(
                    [
                        'text' => 'Page created and ' . $request->uri . ($request->active == 'false' ? 'de' : '') . 'activated',
                        'icon' => 'menu',
                    ]
                );

            } else {
                DB::table('becoded_pages')
                    ->where('uri','=',$request->uri)
                    ->update(['active' => $request->active == 'true' ? 1 : 0]);

                DB::table('becoded_logs')->insert(
                    [
                        'text' => 'Page ' . $request->uri . ($request->active == 'false' ? 'de' : '') . 'activated',
                        'icon' => 'menu',
                    ]
                );

            }

            $result['result'] = 1;
            $result['response'] = 'Page ' . ($request->active == 'false' ? 'de' : '') . 'activated';

        }
        else {
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

        dump($_POST);
        DB::table('becoded_pages')->insert([
           'text' =>  $request->text,
           'uri' =>  $request->uri,
           'title' =>  $request->title,
           'pid' =>  $request->pid,
           'template' =>  $request->template,
           'tag' =>  $request->tag,
           'excerpt' =>  $request->excerpt,
           'in_menu' =>  $request->in_menu ? 1 : 0,
           'active' =>  $request->active ? 1 : 0,
        ]);

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