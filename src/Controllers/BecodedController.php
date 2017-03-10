<?php
namespace Grundmanis\Becoded\Controllers;

use Grundmanis\Becoded\Models\BecodedUser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class BecodedController extends Controller
{
    public function index(Request $request)
    {
        $errors = [];
        return view('becoded_view::dashboard', compact('errors'));
    }

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
        return redirect()->route('becoded.users');

    }

    public function getDeleteUser(Request $request, $id)
    {

        $user = BecodedUser::find($id);
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
        $user->update($request->all());
        return redirect()->route('becoded.users');

    }


}