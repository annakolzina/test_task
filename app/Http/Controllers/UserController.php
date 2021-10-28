<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(5);

        return view('pages.user.users', [
            'users' => $users,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:2|max:100',
            'email' => 'required|email|unique:users,id',
            'password' => 'min:8|max:100',
            'role' => 'nullable'
        ]);

        DB::insert('insert into users (name, email, password, role) values(?, ?, ?, ?)',[
                $request->name,
                $request->email,
                Hash::make($request->password),
                ($request->role == 'on') ? 1 : 0,
            ]);

        return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        Gate::authorize('show-user', [$user]);
        return view('pages.user.show', [
            'user' => $user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        Gate::authorize('update-user', [$user]);
        return view('pages.user.edit', [
            'user' => $user
        ]);
    }

    public function search(Request $request){

        return view('pages.user.users', [
            'users' => User::where('name', 'LIKE', "%{$request->value}%")->paginate(5),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|min:2|max:100',
            'email' => 'nullable|email|unique:users,id,'.$user->id,
            'role' => 'nullable'
        ]);

        if($user->update([
            'name' => $request->name,
            'email' => $request->email,
            'role' => ($request->role == 'on') ? 1 : 0,
        ])){
            return redirect()->route('home');
        }

        return redirect()->route('user.edit', ['user' => $user]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('user.index');
    }
}
