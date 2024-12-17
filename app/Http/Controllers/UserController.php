<?php
namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function index()
    {
        $users = User::all();
        return view('admins.index', compact('users'));
    }

    public function create()
    {
        $role = \Spatie\Permission\Models\Role::all();
        return view('admins.create', compact('role'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:users',
            'password' => 'required',
            'role_id' => 'required'
        ]);

        $type = User::class;

        $user = new User();
        $user->username = $request->input("username");
        $user->password = $request->input("password");
        $user->role_id = $request->input("role_id");
        $user->save();
        $user->roles()->attach($request->input("role_id"), ["model_type" => $type]);

        return redirect()->route('users.index');
    }

    public function show($id)
    {
    }

    public function edit(User $user)
    {
        if (auth()->user()->id == $user->id || $user->getRoleNames()[0] == "super-admin") {
            return redirect()->route('users.index')->with('error','ویرایش این کاربر برای شما امکان پذیر نیست');
        }

        $role = \Spatie\Permission\Models\Role::all();
        return view('admins.edit', compact('user', 'role'));
    }

    public function update(Request $request, User $user)
    {
        $user->update($request->all());
        $user->roles()->sync($request->input("role_id"), ["model_type" => $request->input("role_id")]);

        return redirect()->route('users.index');
    }


    public function destroy(User $user)
    {
//        dd($user->getRoleNames()->toArray()[0]);
//        dd($user->getPermissionNames());

        if (auth()->user()->id == $user->id || $user->getRoleNames()->contains("super-admin")) {
            return redirect()->route('users.index')->with('error','حذف این کاربر برای شما امکان پذیر نیست');
        } else {
            $user->delete();
            $user->roles()->detach();
            return redirect()->route('users.index');
        }
    }
}
