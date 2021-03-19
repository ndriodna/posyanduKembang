<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use DB;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::orderBy('created_at','ASC')->get();
        return view('users.index',compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return view('users.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function saveFile($name,$img)
    {
        $setName = $name.'.'.$img->getClientOriginalExtension();
        $path = $img->storeAs('avatar',$setName);
        return $path;
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|min:3|unique:users',
            'email' => 'required|string|unique:users',
            'password' => 'required|min:6',
            'role' => 'required|string|exists:roles,name',
            'img' => 'nullable|image|mimes:jpg,png,jpeg'
        ]);
        try {
            if ($request->hasFile('img')) {
                $img = $this->saveFile($request->name,$request->file('img'));
            }
           $user = User::firstOrCreate([
                'email' => $request->email
            ],
            [
                'name' => $request->name,
                'password' => bcrypt($request->password),
                'img' => $img
            ]);
            $user->assignRole($request->role);
            return redirect()->route('user.index');
        } catch (Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('users.show',compact('user'));
    }

    public function showAuthUser()
    {
        $user = Auth::user();
        return view('users.edit',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('users.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255|min:3|exists:users,name',
            'email' => 'required|string|exists:users,email',
            'password' => 'nullable|min:6',
            'img' => 'nullable|image|mimes:jpg,png,jpeg'
        ]);
        try {
            $user = User::findOrFail($id);
            $password = !empty($request->password) ? bcrypt($request->password) : $user->password;
            $img = $user->img;
            if ($request->hasFile('img')) {
                Storage::delete($img);
                $imgs = $this->saveFile($request->name,$request->file('img'));
            }
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'img' => $imgs,
                'password' => $password
            ]);
            return redirect(route('user.index'));
        } catch (Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        Storage::delete($user->img);
        $user->delete();
        return redirect(route('user.index'));
    }
}
