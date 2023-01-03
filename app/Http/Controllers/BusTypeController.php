<?php

namespace App\Http\Controllers;

use App\Models\BusType;
use App\Http\Requests\StoreBusTypeRequest;
use App\Http\Requests\UpdateBusTypeRequest;
use Illuminate\Support\Str;

class BusTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.TravelType.TravelTypeIndex',['data'=>BusType::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.TravelType.insert');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBusTypeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBusTypeRequest $request)
    {
        try{
            $slug=Str::random(20);
            BusType::create([
                'bus_type_name'=>$request->bus_type_name,
                'slug'=>$slug
            ]);
        }catch(Exception $e)  
        {  
            if (!($e instanceof SQLException)) {
                app()->make(\App\Exceptions\Handler::class)->report($e); // Report the exception if you don't know what actually caused it
            }
            return redirect()->back()->with('unsuccessMessage', 'Failed to add bus type !!!');  
        } 
           return redirect()->route('traveltype.index')->with('successMessage','Bus Type Added Successfully!!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BusType  $busType
     * @return \Illuminate\Http\Response
     */
    public function show(BusType $busType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BusType  $busType
     * @return \Illuminate\Http\Response
     */
    public function edit($busType)
    {
        $data=BusType::where('slug',$busType)->first();
        return view('admin.TravelType.edit',['traveltype'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBusTypeRequest  $request
     * @param  \App\Models\BusType  $busType
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBusTypeRequest $request,$busType)
    {
        try{
            $data=BusType::where('slug',$busType)->first();
            $data->bus_type_name=$request->bus_type_name;
            }
            catch(Exception $e)  
        {  
            if (!($e instanceof SQLException)) {
                app()->make(\App\Exceptions\Handler::class)->report($e); // Report the exception if you don't know what actually caused it
            }
            return redirect()->back()->with('unsuccessMessage', 'Failed to update bus type !!!');  
        } 
           $data->save();
           return redirect()->route('traveltype.index')->with('successMessage','Bus type Updated Successfully!!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BusType  $busType
     * @return \Illuminate\Http\Response
     */
    public function destroy($busType)
    {
        BusType::where('slug',$busType)->first()->delete();
        return back()->with('successMessage','Bus type Deleted Successfully!!!');
    }
}
