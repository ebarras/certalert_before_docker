<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Agreement;
use App\Cert;

class CertController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $agreements = Agreement::with('agency')->get();
        $certs = Cert::with('agreement')->get();
        return view('certs')
          ->with('agreements', $agreements)
          ->with('certs', $certs)
        ;
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
        //return('Add A Cert Route Here');

        $request->validate([
            'url_field' => 'bail|required|unique:certs,url|max:255',
            'agreement_field' => 'required',
            'expiration_date' => 'required|date',
        ]);
        $cert = new Cert;
        $cert->url = $request->url_field;
        $cert->expiration_date = $request->expiration_date;
        $cert->agreement_id = $request->agreement_field;
        $cert->incident = $request->incident_field;
        $cert->serial_number = $request->serial_number_field;
        $cert->save();
        return redirect()->route('certs.index')
                        ->with('success','Cert "' . $cert->url . '" created successfully.');

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
