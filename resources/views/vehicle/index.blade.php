@extends("layouts.app")
@section('content')
    <div class="container">
        {{ $vehicles->links() }}        
        <div class="row">
            <div class="col-md-6">
                <div class="row">
                    <a class="text-md-start text-warning" href="{{ url('/vehicles/add') }}"> + Add Vehicle (မော်တော်ယာဥ်အသစ်ထည့်သွင်းရန်)</a>                    
                </div>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <p class="text-md-end text-info"> Total : {{ $vehicles->count(); }}</p>
                </div>
            </div>
        </div><br>
        <div class="">            
            <form action="{{ url('/vehicles/search')  }}">
                @csrf
                <div class="input-group mb-3">
                    <input type="text" name="search" class="form-control" placeholder="Search by Vehicle Number (မော်တော်ယာဥ်နံပါတ်ဖြင့်ရှာပါ)"
                        aria-label="Search by Vehicle Number (မော်တော်ယာဥ်နံပါတ်ဖြင့်ရှာပါ)" aria-describedby="basic-addon2">                
                    <button type="submit" class="input-group-btn btn btn-primary">Search</button>
                    <a href="{{ url('/vehicles') }}" class="btn btn-danger">Reset</a>
                </div>                
            </form>
        </div>
        @foreach ($vehicles as $vehicle)
            <div class="card mb-2">
                <div class="card-body bg-secondary text-info" data-bs-toggle="collapse"
                    data-bs-target="#col{{ $vehicle->id }}" aria-expanded="false" aria-controls="collapseExample">
                    <div class="row">
                        <div class="col-md-6">
                            <h4 class="card-title text-md-end">{{ $vehicle->vehicle_number }}</h4>
                        </div>
                        <div class="col-md-6">
                            <h4 class="card-title text-md-start">{{ $vehicle->vehicle_type }}</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="collapse" id="col{{ $vehicle->id }}">
                <div class="card card-body mb-2 bg-dark">
                    <div class="row text-white p-3">
                        <div class="col-md-6">
                            <div class="row">
                                <p class="text-md-end text-secondary">Vehicle Type (ယာဥ်အမျိုးအစား)</p>
                            </div>                            
                            <div class="row">
                                <p class="text-md-end text-secondary">Engine Number (အင်ဂျင်အမှတ်)</p>
                            </div>
                            <div class="row">
                                <p class="text-md-end text-secondary">Vehicle Color (အရောင်)</p>
                            </div>
                            <div class="row">
                                <p class="text-md-end text-secondary">Year (ကားထုတ်လုပ်သည့်ခုနှစ်)</p>
                            </div>
                            <div class="row">
                                <p class="text-md-end text-secondary">Owner Name (ယာဥ်ပိုင်ရှင်အမည်)</p>
                            </div>                            
                            <div class="row">
                                <p class="text-md-end text-secondary">Phone (ဖုန်း)</p>
                            </div>                            
                            <div class="row"><a class="text-md-end text-primary"
                                    href="{{ url("/repairs/$vehicle->id") }}">View Records (ပြင်ဆင်စာရင်းကြည့်မယ်)</a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <p>{{ $vehicle->vehicle_type }}</p>
                            </div>                            
                            <div class="row">
                                <p>{{ $vehicle->engine_number }}</p>
                            </div>
                            <div class="row">
                                <p>{{ $vehicle->vehicle_color }}</p>
                            </div>
                            <div class="row">
                                <p>{{ $vehicle->vehicle_year }}</p>
                            </div>
                            <div class="row">
                                <p>{{ $vehicle->owner_name }}</p>
                            </div>                           
                            <div class="row">
                                <p>{{ $vehicle->phone }}</p>
                            </div>                            
                            <div class="row"><a href="{{ url("/repairs/$vehicle->id/add") }}" class="text-warning">New Record
                                    (စာရင်းအသစ်ထည့်သွင်းမည်)</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
