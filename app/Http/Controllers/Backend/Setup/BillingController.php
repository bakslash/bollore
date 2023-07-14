<?php

namespace App\Http\Controllers\Backend\Setup;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Billing;

class BillingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $billing = Billing::latest()->paginate(10);

        return view("backend.setup.billing.index", compact('billing'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("backend.setup.billing.create");
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
            'bparty' => 'required'
        ]);

        Billing::updateOrCreate(['bparty' => request('bparty')]);

        return redirect()
            ->to(route("admin.setup.billing.index"))
            ->with('flash_success', 'Billing Party created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Billing  $billing
     * @return \Illuminate\Http\Response
     */
    public function show(Billing $billing)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Billing  $billing
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $billing = Billing::findOrFail($id);

        return view("backend.setup.billing.edit", compact('billing'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Billing  $billing
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        //
        request()->validate([
            'bparty' => 'required'
        ]);

        $billing = Billing::findOrFail($id);

        $billing->update(['bparty' => request('bparty')]);

        return redirect()
            ->to(route("admin.setup.billing.index"))
            ->with('flash_success', 'Billing Party updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Billing  $billing
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Billing::destroy(($id));

        return redirect()
            ->to(route("admin.setup.billing.index"))
            ->with('flash_success', 'Billing Party deleted successfully');
    }
}
