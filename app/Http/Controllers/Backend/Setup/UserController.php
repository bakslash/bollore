<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user = User::latest()->paginate(10);

        return view("backend.setup.user.index", compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("backend.setup.user.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        //
        request()->validate([
            'sname' => 'required',
            'uname' => 'required',
            'email' => 'required',
        ]);

        User::updateOrCreate(['sname' => request('sname')]);
        User::updateOrCreate(['uname' => request('uname')]);
        User::updateOrCreate(['email' => request('email')]);

        return redirect()
            ->to(route("admin.setup.user.index"))
            ->with('flash_success', 'User created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $user = User::findOrFail($id);

        return view("backend.setup.user.edit", compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        //
        request()->validate([
            'sname' => 'required',
            'uname' => 'required',
            'email' => 'required',
        ]);

        $user = User::findOrFail($id);

        $user->update(['sname' => request('sname')]);
        $user->update(['uname' => request('uname')]);
        $user->update(['email' => request('email')]);

        return redirect()
            ->to(route("admin.setup.user.index"))
            ->with('flash_success', 'User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        User::destroy(($id));

        return redirect()
            ->to(route("admin.setup.user.index"))
            ->with('flash_success', 'User deleted successfully');
    }
}
