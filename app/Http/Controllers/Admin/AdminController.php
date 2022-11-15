<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Registered;

class AdminController extends Controller
{
    public function index()
    {
        $superadminRole = Role::where('name' , 'superadmin')->first();
        $adminRole = Role::where('name' , 'admin')->first();
        $data['admins'] = User::whereIn('role_id' ,[$superadminRole->id , $adminRole->id])
        ->orderby('id' , 'DESC')
        ->paginate(10);
        return view('admin.admins.index')->with($data);
    }

    public function create()
    {
        $data['roles'] = Role::select('id' , 'name')
        ->whereIn('name' , ['admin' , 'superadmin'])->get();
        return view('admin.admins.create')->with($data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:10',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8',
            'role_id' => 'required|exists:roles,id'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'access_token' => Str::random(50),
            'role_id' => $request->role_id
        ]);

        event(new Registered($user));

        return redirect(url("dashboard/admins"));

    }

    public function promote($id)
    {
        $admin = User::findOrFail($id);
        $superadmin = Role::select('id' , 'name')->where('name' , 'superadmin')->first();
        $admin->update([
            'role_id' => $superadmin->id
        ]);
        return back();
    }

    public function demote($id)
    {
        $superadmin = User::findOrFail($id);
        $admin = Role::select('id' , 'name')->where('name' , 'admin')->first();
        $superadmin->update([
            'role_id' => $admin->id
        ]);
        return back();
    }

    public function delete(Request $request , $id)
    {
        $user = User::findOrFail($id);

        $user->delete();

        return back();
    }
}
