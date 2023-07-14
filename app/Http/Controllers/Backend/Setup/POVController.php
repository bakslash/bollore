<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Models\POV;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class POVController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pov = POV::latest()->paginate(10);

        return view("backend.setup.pov.index", compact('pov'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("backend.setup.pov.create");
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
            'pname' => 'required'
        ]);

        POV::updateOrCreate(['pname' => request('pname')]);

        return redirect()
            ->to(route("admin.setup.pov.index"))
            ->with('flash_success', 'Purpose Of Visit created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\POV  $pOV
     * @return \Illuminate\Http\Response
     */
    public function show(POV $pOV)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\POV  $pOV
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $pov = POV::findOrFail($id);

        return view("backend.setup.pov.edit", compact('pov'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\POV  $pOV
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        //
        request()->validate([
            'pname' => 'required'
        ]);

        $pov = POV::findOrFail($id);

        $pov->update(['pname' => request('pname')]);

        return redirect()
            ->to(route("admin.setup.pov.index"))
            ->with('flash_success', 'Purpose Of Visit updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\POV  $pOV
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        POV::destroy(($id));

        return redirect()
            ->to(route("admin.setup.pov.index"))
            ->with('flash_success', 'Purpose Of Visit deleted successfully');
    }
}
