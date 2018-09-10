<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Agency;

class AgencyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        //return('Post to Store Agency');
        $request->agency_name_abbreviated = strtoupper($request->agency_name_abbreviated);
        $request->validate([
            'agency_name_abbreviated' => 'bail|required|unique:agencies,name_abbreviated|max:5',
            'agency_name_long' => 'required|max:255',
        ]);
        $agency = new Agency;
        $agency->name_abbreviated = $request->agency_name_abbreviated;
        $agency->name_long = $request->agency_name_long;
        $agency->save();
        return redirect()->route('agreements.index')
                        ->with('success','Agency "' . $agency->name_abbreviated . ' - ' . $request->agency_name_long . '" created successfully.');
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
    }
}
