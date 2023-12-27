<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index() : View
    {
        $users = User::orderBy('name');
        $numberOfUsers = $users->count();
        $numberOfOnlineUsers = $numberOfUsers - User::whereToken(null)->count();
        $users = $users->paginate(15);

        return view('users.index', compact('users', 'numberOfUsers', 'numberOfOnlineUsers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|View
     */
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, User $user)
    {
        $attributes = $request->validate([
            "name" => ['required', 'max:255'],
            "email" => ['required',
                'email',
                'max:255',
                Rule::unique('users', 'email')
                    ->ignore($user->id)],
            "town" => ['required', 'min:2', 'max:255'],
            "phoneNumber" => ['required', 'min:9', 'max:12'],
        ]);

        if (isset($request['password'])) {
            $request->validate([
                'old_password' => ['required'],
                'password' => ['confirmed', 'min:8']
            ]);
            if (\Hash::check($request['old_password'], $user->password)) {
                $user->update([
                    "password" => $request['password'],
                ]);
            } else {
                return redirect()->back()->withErrors(['old_password' => "The password is incorrect! "]);
            }
        }

        $user->update([
            "name" => $attributes['name'],
            "town" => $attributes['town'],
            "phoneNumber" => $attributes['phoneNumber'],
            "email" => $attributes['email'],
        ]);

        session()->flash('update-user', 'Information Updated Successfully!');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  User $user
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function destroy(User $user)
    {

        $user->deleteOrFail();

        session()->flash('delete-user', 'User Deleted Successfully!');

        if (\Auth::id() === $user->id) {
            \Auth::logout();
        }

        return redirect('/dashboard');
    }
}
