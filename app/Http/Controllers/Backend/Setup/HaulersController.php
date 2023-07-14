<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Models\Haulers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HaulersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $haulers = Haulers::latest()->paginate(10);

        return view("backend.setup.haulers.index", compact('haulers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("backend.setup.haulers.create");
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
            'hname' => 'required'
        ]);

        Haulers::updateOrCreate(['hname' => request('hname')]);

        return redirect()
            ->to(route("admin.setup.haulers.index"))
            ->with('flash_success', 'Haulers created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Haulers  $haulers
     * @return \Illuminate\Http\Response
     */
    public function show(Haulers $haulers)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Haulers  $haulers
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $haulers = Haulers::findOrFail($id);

        return view("backend.setup.haulers.edit", compact('haulers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Haulers  $haulers
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        //
        request()->validate([
            'hname' => 'required'
        ]);

       $haulers =  Haulers::findOrFail($id);

       $haulers->update(['hname' => request('hname')]);

        return redirect()
            ->to(route("admin.setup.haulers.index"))
            ->with('flash_success', 'Haulers updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Haulers  $haulers
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Haulers::destroy(($id));

        return redirect()
            ->to(route("admin.setup.haulers.index"))
            ->with('flash_success', 'Haulers deleted successfully');
    }
}
