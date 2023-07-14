<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Models\ExitStatus;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ExitStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $exit = ExitStatus::latest()->paginate(10);

        return view("backend.setup.exit.index", compact('exit'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("backend.setup.exit.create");
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
        request()->validate([
            'estatus' => 'required'
        ]);

        ExitStatus::updateOrCreate(['estatus' => request('estatus')]);

        return redirect()
            ->to(route("admin.setup.exit.index"))
            ->with('flash_success', 'Exit Status created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ExitStatus  $exitStatus
     * @return \Illuminate\Http\Response
     */
    public function show(ExitStatus $exitStatus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ExitStatus  $exitStatus
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $exit = ExitStatus::findOrFail($id);

        return view("backend.setup.exit.edit", compact('exit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ExitStatus  $exitStatus
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        //
        request()->validate([
            'estatus' => 'required'
        ]);

        $exit = ExitStatus::findOrFail($id);

        $exit->update(['estatus' => request('estatus')]);

        return redirect()
            ->to(route("admin.setup.exit.index"))
            ->with('flash_success', 'Exit Status updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ExitStatus  $exitStatus
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        ExitStatus::destroy(($id));

        return redirect()
            ->to(route("admin.setup.exit.index"))
            ->with('flash_success', 'Exit Status deleted successfully');
    }
}
