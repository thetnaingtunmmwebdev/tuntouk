<?php

namespace App\Http\Controllers;

use App\Models\Repair;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Symfony\Component\CssSelector\Node\FunctionNode;

class RepairController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($id)
    {
        $data = Repair::where('vehicle_id', $id)->get()->sortBy('repair_received_date');
        return view('repair.index', ['repairs' => $data, 'vehicle_id' => $id]);
    }

    public function add($id)
    {
        return view('repair.add', ['vehicle_id' => $id]);
    }

    // public function search()
    // {
    //     $search = request()->search;
    //     $vehicle = Vehicle::where('vehicle_number', 'like', '%' . $search . '%');
    //     $data = Repair::where('vehicle_id', 'like', '%' . $vehicle->id . '%')->paginate(5);
    //     return view('repair.index', [
    //         'repairs' => $data
    //     ]);
    // }

    public function create($id)
    {
        $validator = validator(request()->all(), [
            'vehicle_id' => 'required',
            'repair_complain' => 'required',
            'repair_diagnostic' => 'required',            
            'repair_parts' => 'required',
            'repair_remarks' => 'required',
            'repair_received_date' => 'required',
            'repair_delivered_date' => 'required',            
            'repair_technician_id' => 'required',        
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator);
        }

        $repair = new Repair();
        $repair->vehicle_id = $id;
        $repair->repair_complain = request()->repair_complain;
        $repair->repair_diagnostic = request()->repair_diagnostic;    
        $repair->repair_parts = request()->repair_parts;
        $repair->repair_remarks = request()->repair_remarks;        
        $repair->repair_received_date = date('Y-m-d ' , strtotime(request()->repair_received_date));
        $repair->repair_delivered_date = date('Y-m-d ' , strtotime(request()->repair_delivered_date));
        $repair->repair_technician_id = request()->repair_technician_id;
        $repair->save();
        return redirect("/repairs/$id");
    }

    public function edit($id)
    {
        $data = Repair::where('id', $id)->get();
        return view('repair.edit', ['repairs' => $data]);
    }

    public function update($id)
    {
        $validator = validator(request()->all(), [
            'vehicle_id' => 'required',
            'repair_complain' => 'required',
            'repair_diagnostic' => 'required',            
            'repair_parts' => 'required',
            'repair_remarks' => 'required',
            'repair_received_date' => 'required',
            'repair_delivered_date' => 'required',            
            'repair_technician_id' => 'required',        
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator);
        }
        $vehicle_id = request()->vehicle_id;
        $repair = Repair::find($id);
        $repair->vehicle_id = request()->vehicle_id;
        $repair->repair_complain = request()->repair_complain;
        $repair->repair_diagnostic = request()->repair_diagnostic;    
        $repair->repair_parts = request()->repair_parts;
        $repair->repair_remarks = request()->repair_remarks;        
        $repair->repair_received_date = date('Y-m-d ' , strtotime(request()->repair_received_date));
        $repair->repair_delivered_date = date('Y-m-d ' , strtotime(request()->repair_delivered_date));
        $repair->repair_technician_id = request()->repair_technician_id;
        $repair->save();
        return redirect("/repairs/$vehicle_id");
    }
}
