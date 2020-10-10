<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\doctors;
use App\timeTable;
use App\booking;
class searchDoctorsController extends Controller
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
        $times = timeTable::all();
        //$timeLength = count($times);
        //$z= $doctors[4]->timetables;
        //dd($doctors);
        return view ('searchDoctors.index',['doctors'=>$doctors,'times'=>$times]);
    }

    public function booking($time,$doctor,$id)
    {
        //dd($doctor); //registrarion
        //dd($time);
        return view ('searchDoctors.registrarion',['doctor'=>$doctor,'time'=>$time,'id'=>$id]);
    }

    public function store_booking(Request $request)
    {
        $booking = booking::create($request->all());
        //dd($request);
        return redirect()->route('doctors.index')->with('message',' done your request is done ');
    }
    public function search (Request $request)
    {
        //dd($request);
        $query = '%' . request('search') . '%';
        
        $doctors = doctors::where('name','LIKE',$query)
        ->orWhere('description','LIKE', $query)
        ->orWhere('language','LIKE',$query)
        ->orWhere('country','LIKE',$query)
        ->orWhere('major','LIKE',$query)
        ->orWhere('profile','LIKE',$query)
        ->get();
        //dd($doctors);
        $times = timeTable::all();
        return view ('searchDoctors.index',['doctors'=>$doctors,'times'=>$times]);
    }

}
