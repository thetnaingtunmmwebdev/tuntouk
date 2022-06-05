@extends("layouts.app")
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="row">
                    <a class="text-md-start text-warning" href="{{ url("/repairs/$vehicle_id/add") }}"> + Add Repair Record (ပြင်ဆင်စာရင်းအသစ်ထည့်သွင်းမည်)</a>                    
                </div>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <a class="text-md-end text-danger" href="{{ url("/vehicles") }}"> < Go back to Vehicles List (မော်တော်ယာဥ်စာရင်းသို့ ပြန်သွားမည်)</a>
                </div>
            </div>
        </div><br>
        @foreach ($repairs as $repair)            
            <div class="card mb-2">
                <div class="card-body bg-secondary text-info" data-bs-toggle="collapse"
                    data-bs-target="#col{{ $repair->id }}" aria-expanded="false" aria-controls="collapseExample">
                    <div class="row">
                        <div class="col-md-4">
                            <h4 class="card-title text-md-end">{{ $repair->vehicle->vehicle_number }}</h4>
                        </div>
                        <div class="col-md-4">
                            <h4 class="card-title text-md-end">{{ $repair->repair_received_date }}</h4>
                        </div>
                        <div class="col-md-4">
                            <h4 class="card-title ">{{ $repair->repair_delivered_date }}</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="collapse" id="col{{ $repair->id }}">
                <div class="card card-body mb-2 bg-dark">
                    <div class="row text-white p-3">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <p class="text-md-end text-secondary">Complain (တင်ပြချက်)</p>
                                </div>
                                <div class="col-md-6">
                                    <p>{{ $repair->repair_complain }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <p class="text-md-end text-secondary">Diagnostic (စစ်ဆေးခြင်း)</p>
                                </div>
                                <div class="col-md-6">
                                    <p>{{ $repair->repair_diagnostic }}</p>
                                </div>
                            </div>                            
                            <div class="row">
                                <div class="col-md-6">
                                    <p class="text-md-end text-secondary">Replace Parts (ပြောင်းလဲတပ်ဆင်သောအပိုပစ္စည်း)</p>                                
                                </div>
                                <div class="col-md-6">
                                    <pre>{{ $repair->repair_parts }}</pre>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <p class="text-md-end text-secondary">Received Date (လက်ခံရက်)</p>                                
                                </div>
                                <div class="col-md-6">
                                    <p>{{ $repair->repair_received_date }}</p>
                                </div>
                            </div>
                            <div class="row">                                
                                <div class="col-md-6">
                                    <p class="text-md-end text-secondary">Delivered Date (ပြန်အပ်ရက်)</p>                                
                                </div>
                                <div class="col-md-6">
                                    <p>{{ $repair->repair_delivered_date }}</p>
                                </div>
                            </div>
                            <div class="row">                                
                                <div class="col-md-6">
                                    <p class="text-md-end text-secondary">Repair By (ပြင်ဆင်သူ)</p>                                
                                </div>
                                <div class="col-md-6">
                                    <p>{{ $repair->repair_technician_id }}</p>
                                </div>
                            </div>
                            <div class="row">                                
                                <div class="col-md-6">
                                    <p class="text-md-end text-secondary">Remark (မှတ်ချက်)</p>                                
                                </div>
                                <div class="col-md-6">
                                    <p>{{ $repair->repair_remarks }}</p>
                                </div>
                            </div>
                            <div class="row">                                
                                <div class="col-md-6">
                                    <p class="text-md-end text-secondary"></p>                                
                                </div>
                                <div class="col-md-6">
                                    <a class="text-md-start text-warning" href="{{ url("/repairs/$vehicle_id/edit") }}"> + Edit Repair Record (ပြင်ဆင်စာရင်းအားပြင်ဆင်မည်)</a>                    
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
