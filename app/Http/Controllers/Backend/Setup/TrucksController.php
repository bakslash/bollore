<?php

namespace App\Http\Controllers\Backend\Setup;

use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use App\Http\Controllers\Controller;
use App\Models\Trucks;

class TrucksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $trucks = Trucks::latest()->paginate(10);

        return view("backend.setup.trucks.index", compact('trucks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("backend.setup.trucks.create");
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
            'treg' => 'required',
            'hreg' => 'required',
        ]);

        Trucks::updateOrCreate(['treg' => request('treg')]);
        Trucks::updateOrCreate(['hreg' => request('hreg')]);

        return redirect()
            ->to(route("admin.setup.trucks.index"))
            ->with('flash_success', 'Trucks created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $trucks = Trucks::findOrFail($id);

        return view("backend.setup.trucks.edit", compact('trucks'));
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
        //
        request()->validate([
            'treg' => 'required',
            'hreg' => 'required',
        ]);

        $trucks = Trucks::findOrFail($id);

        $trucks->update(['treg' => request('treg')]);
        $trucks->update(['hreg' => request('hreg')]);

        return redirect()
            ->to(route("admin.setup.trucks.index"))
            ->with('flash_success', 'Truck(s) updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Trucks::destroy(($id));

        return redirect()
            ->to(route("admin.setup.trucks.index"))
            ->with('flash_success', 'Truck(s) deleted successfully');
    }
}
