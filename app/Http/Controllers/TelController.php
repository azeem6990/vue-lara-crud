<?php

namespace App\Http\Controllers;

use App\Models\Tel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Jobs\ExportContactsJob;
use App\Exports\ContactExport;
use Excel;

class TelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Tel::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      
        Tel::create($request->all());

        return response(status: 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\tel  $tel
     * @return \Illuminate\Http\Response
     */
    public function show(Tel $tel)
    {

        return $tel;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\tel  $tel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tel $tel)
    {
      
        $tel->update($request->all());

        return response(status: 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\tel  $tel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tel $tel)
    {

        $tel->delete();

        return response(status: 204);
        
    }
    
    public function exportData(){
        //return Excel::download(new ContactExport, 'users.xlsx');
        //dispatch(new ExportContactsJob());
        return Excel::download(new ContactExport, 'ContactList.csv');
    }
}
