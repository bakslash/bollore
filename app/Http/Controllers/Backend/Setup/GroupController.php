<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Models\Group;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $group = Group::latest()->paginate(10);

        return view("backend.setup.group.index", compact('group'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("backend.setup.group.create");
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
            'group' => 'required'
        ]);

        Group::updateOrCreate(['group' => request('group')]);

        return redirect()
            ->to(route("admin.setup.group.index"))
            ->with('flash_success', 'Group Name created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function show(Group $group)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $group = Group::findOrFail($id);

        return view("backend.setup.group.edit", compact('group'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        //
        request()->validate([
            'group' => 'required'
        ]);

        $group = Group::findOrFail($id);

        $group->update(['group' => request('group')]);

        return redirect()
            ->to(route("admin.setup.group.index"))
            ->with('flash_success', 'Group Name updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Group::destroy(($id));

        return redirect()
            ->to(route("admin.setup.group.index"))
            ->with('flash_success', 'Group Name deleted successfully');
    }
}
