<?php
namespace Grundmanis\Becoded\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class BaseController extends Controller
{
    public function __construct()
    {

        $logs = DB::table('becoded_logs')
            ->where('seen',NULL)
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();

        // Sharing is caring
        View::share('top_logs', $logs);
    }

    public function getLogs() {

        DB::table('becoded_logs')->where('seen',NULL)->update(['seen' => 1]);

        $logs = DB::table('becoded_logs')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('becoded_view::logs.index',['logs' => $logs]);
    }

}