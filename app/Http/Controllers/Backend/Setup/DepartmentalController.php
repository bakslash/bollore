<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Models\Departmental;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DepartmentalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $department = Departmental::latest()->paginate(10);

        return view("backend.setup.department.index", compact('department'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("backend.setup.department.create");
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
            'dname' => 'required'
        ]);

        Departmental::updateOrCreate(['dname' => request('dname')]);

        return redirect()
            ->to(route("admin.setup.department.index"))
            ->with('flash_success', 'Department Name created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Departmental  $departmental
     * @return \Illuminate\Http\Response
     */
    public function show(Departmental $departmental)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Departmental  $departmental
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $department = Departmental::findOrFail($id);

        return view("backend.setup.department.edit", compact('department'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Departmental  $departmental
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        //
        request()->validate([
            'dname' => 'required'
        ]);

        $department = Departmental::findOrFail($id);

        $department->update(['dname' => request('dname')]);

        return redirect()
            ->to(route("admin.setup.department.index"))
            ->with('flash_success', 'Department Name updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Departmental  $departmental
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Departmental::destroy(($id));

        return redirect()
            ->to(route("admin.setup.department.index"))
            ->with('flash_success', 'Department Name deleted successfully');
    }
}
