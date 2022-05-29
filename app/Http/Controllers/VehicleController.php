<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Vehicle;

class VehicleController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $data = Vehicle::latest()->get();

        return view('vehicle.index', [
            'vehicles' => $data
        ]);
    }

    public function add()
    {
        return view('vehicle.add');
    }

    public function search()
    {
        $search = request()->search;
        $data = Vehicle::where('vehicle_number', 'like' , '%'.$search.'%');
        return view('vehicle.index', [
            'vehicles' => $data
        ]);
    }

    public function create()
    {
        $validator = validator(request()->all(), [
            'member_number' => 'required',
            'vehicle_number' => 'required',
            'vehicle_type' => 'required',            
            'engine_number' => 'required',
            'vehicle_color' => 'required',
            'vehicle_year' => 'required',
            'owner_name' => 'required',            
            'phone' => 'required',
            
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator);
        }

        $vehicle = new Vehicle();
        $vehicle->member_number = request()->member_number;
        $vehicle->vehicle_number = request()->vehicle_number;
        $vehicle->vehicle_type = request()->vehicle_type;
        $vehicle->engine_number = request()->engine_number;
        $vehicle->vehicle_color = request()->vehicle_color;
        $vehicle->vehicle_year = request()->vehicle_year;
        $vehicle->owner_name = request()->owner_name;
        $vehicle->phone = request()->phone;
        $vehicle->save();
        return redirect('/vehicles');
    }
}
