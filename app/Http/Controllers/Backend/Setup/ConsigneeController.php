<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Models\Consignees;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ConsigneeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $consignee = Consignees::latest()->paginate(10);

        return view("backend.setup.consignees.index", compact('consignee'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("backend.setup.consignees.create");
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
            'cname' => 'required'
        ]);

        Consignees::updateOrCreate(['cname' => request('cname')]);

        return redirect()
            ->to(route("admin.setup.consignees.index"))
            ->with('flash_success', 'Consignees Name created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Consignees  $consignees
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Consignees  $consignees
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $consignee = Consignees::findOrFail($id);

        return view("backend.setup.consignees.edit", compact('consignees'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Consignees  $consignees
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        //
        request()->validate([
            'cname' => 'required'
        ]);

        $consignee = Consignees::findOrFail($id);

        $consignee->update(['cname' => request('cname')]);

        return redirect()
            ->to(route("admin.setup.consignees.index"))
            ->with('flash_success', 'Consignees Name updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Consignees  $consignees
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Consignees::destroy(($id));

        return redirect()
            ->to(route("admin.setup.consignees.index"))
            ->with('flash_success', 'Consignees deleted successfully');
    }
}
