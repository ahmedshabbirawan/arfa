<?php

namespace App\Http\Controllers\Setting;

use App\Http\Controllers\Controller;
use App\Models\Shop;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class TenantController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function settingEdit()
    {
        $id = auth()->user()->id;
        $roles = Role::orderBy('name','asc')->get();
        $row = User::where('id', $id)->with('roles')->first();
        $shops = Shop::orderBy('name','asc')->get()->pluck('name', 'id');
        if ($row) {
            return view('settings.view', compact('row', 'roles','shops'));
        } else {
            return redirect()->back()->with('error', 'User Not Found');
        }
    }
}
