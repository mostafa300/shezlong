<?php

namespace App\Http\Controllers\Admin;

use App\doctors;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\timeTable;
class DoctorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $doctors = doctors::orderBy('id','desc')->get();
        return view('admin.doctor.index',['doctors'=>$doctors]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $timetables = timeTable::all();
        //dd($timetables[1]->time);
        return view('admin.doctor.create', ['timetables'=>$timetables]);
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
        $validatedDat =  $request->validate ([
            'name' => ['string','required'],
            'description' => ['string','required'],
            'language' => ['string','nullable'],
            'join_at' => ['string','nullable'],
            'major' => ['string','required'],
            'major' => ['string','required'],
        ]);
        $doctor = doctors::create($request->all());
        $doctor->timetables()->sync($request->input('timetables', []));
        return redirect()->route('admin.doctors.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\doctors  $doctors
     * @return \Illuminate\Http\Response
     */
    public function show(doctors $doctors)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\doctors  $doctors
     * @return \Illuminate\Http\Response
     */
    public function edit(doctors $doctors)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\doctors  $doctors
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, doctors $doctors)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\doctors  $doctors
     * @return \Illuminate\Http\Response
     */
    public function destroy(doctors $doctors)
    {
        //
    }
}
