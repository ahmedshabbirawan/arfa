<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Shop;
use App\Models\ShopAdmin;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class UserProfileController extends Controller{

    function profileView()
    {
        $id = auth()->user()->id;
        $roles = Role::orderBy('name','asc')->get();
        $row = User::where('id', $id)->with('roles')->first();
        $shops = Shop::orderBy('name','asc')->get()->pluck('name', 'id');
        if ($row) {
            return view('user_management.user_profile.view', compact('row', 'roles','shops'));
        } else {
            return redirect()->back()->with('error', 'User Not Found');
        }
    }

    function passwordUpdate(Request $request)
    {
        $request->validate([
            'current_password' => ['required', 'current_password'],
            'password' => ['required', 'confirmed', Password::min(6)],
        ]);

        $request->user()->update([
            'password' => Hash::make($request->password),
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Password updated successfully.'
        ]);
    }




}
