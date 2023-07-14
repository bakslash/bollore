<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Models\Entry;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EntryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $entry = Entry::latest()->paginate(10);

        return view("backend.setup.entry.index", compact('entry'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("backend.setup.entry.create");
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

        Entry::updateOrCreate(['estatus' => request('estatus')]);

        return redirect()
            ->to(route("admin.setup.entry.index"))
            ->with('flash_success', 'Entry Status created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Entry  $entry
     * @return \Illuminate\Http\Response
     */
    public function show(Entry $entry)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Entry  $entry
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $entry = Entry::findOrFail($id);

        return view("backend.setup.entry.edit", compact('entry'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Entry  $entry
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        //
        request()->validate([
            'estatus' => 'required'
        ]);

        $entry = Entry::findOrFail($id);

        $entry->update(['estatus' => request('estatus')]);

        return redirect()
            ->to(route("admin.setup.entry.index"))
            ->with('flash_success', 'Entry Status updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Entry  $entry
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Entry::destroy(($id));

        return redirect()
            ->to(route("admin.setup.entry.index"))
            ->with('flash_success', 'Entry Status deleted successfully');
    }
}
