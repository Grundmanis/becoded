<?php
namespace Grundmanis\Becoded\Controllers;

use Grundmanis\Becoded\Models\BecodedUser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class UserController extends BaseController
{

    public function getUsers(Request $request)
    {
        $users = BecodedUser::all();
        return view('becoded_view::users.index', ['users' => $users]);
    }

    public function getAddUser(Request $request)
    {
        $users = BecodedUser::all();
        return view('becoded_view::users.add', ['users' => $users]);
    }

    public function postAddUser(Request $request)
    {

        $user = new BecodedUser();
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->name = $request->name;
        $user->save();

        DB::table('becoded_logs')->insert(
            [
                'text' => 'New user added: ' . $request->email,
                'icon' => 'person',
            ]
        );

        return redirect()->route('becoded.users');

    }

    public function getDeleteUser(Request $request, $id)
    {

        $user = BecodedUser::find($id);

        DB::table('becoded_logs')->insert(
            [
                'text' => 'User deleted: ' . $user->email,
                'icon' => 'person',
            ]
        );

        $user->delete();

        return redirect()->route('becoded.users');

    }

    public function getEditUser(Request $request, $id)
    {

        $user = BecodedUser::find($id);
        return view('becoded_view::users.edit', ['user' => $user]);

    }

    public function postEditUser(Request $request, $id)
    {

        $user = BecodedUser::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->password) {
            $user->password = bcrypt($request->password);
        }
        $user->update();

        DB::table('becoded_logs')->insert(
            [
                'text' => 'User updated: ' . $user->email,
                'icon' => 'person',
            ]
        );

        return redirect()->route('becoded.users');

    }


}