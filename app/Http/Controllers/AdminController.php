<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\Rule;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index() : View
    {
        if (! \Gate::check('create-admins')){
            abort(Response::HTTP_FORBIDDEN);
        }

        return view('admins.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        $this->index();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        if (! \Gate::check('create-admins')){
            abort(Response::HTTP_FORBIDDEN);
        }

        $attributes = $request->validate([
            "name" => ['required', 'max:255'],
            "email" => ['required', 'email', 'max:255', Rule::unique('users', 'email')],
            "town" => ['string', 'max:255'],
            "phoneNumber" => ['string', 'max:255'],
            "password" => ['required', 'confirmed'],
        ]);

        $user = User::create([
            "name" => $attributes['name'],
            "email" => $attributes['email'],
            "password" => $attributes['password'],
            "town" => $attributes['town'],
            "birthdate" => Carbon::now()->format('D/M/Y'),
            "level_id" => 0,
            "speciality_id" => 0,
            "gender" => "Male",
            "phoneNumber" => $attributes['phoneNumber'],
        ]);

        $adminRole = Role::firstWhere('name', '=', 'admin');

        $user->roles()->attach($adminRole);

        session()->flash('success', 'Admin created');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
