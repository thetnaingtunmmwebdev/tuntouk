@extends('layouts.app')
@section('content')
    <div class="container">
        @if ($errors->any())
            <div class="alert alert-warning">
                <ol>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ol>
            </div>
        @endif
        @foreach ($vehicles as $v) 
        <form method="post">
            @csrf
            <div class="row text-white">
                <input type="hidden" name="vehicle_id" value="{{ $v->id }}">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label>Member Number (အသင်းဝင်အမှတ်)</label>
                        <input type="text" name="member_number" class="form-control" value="{{ $v->member_number }}">
                    </div>
                    <div class="mb-3">
                        <label>Vehicle Number (ယာဥ်အမှတ်)</label>
                        <input type="text" name="vehicle_number" class="form-control" value="{{ $v->vehicle_number }}">
                    </div>
                    <div class="mb-3">
                        <label>Vehicle Type (ယာဥ်အမျိုးအစား)</label>
                        <input type="text" name="vehicle_type" class="form-control" value="{{ $v->vehicle_type }}">
                    </div>
                    
                    <div class="mb-3">
                        <label>Engine Number (အင်ဂျင်အမှတ်)</label>
                        <input type="text" name="engine_number" class="form-control" value="{{ $v->engine_number }}">
                    </div>
                    <div class="mb-3">
                        <label>Vehicle Color (အရောင်)</label>
                        <input type="text" name="vehicle_color" class="form-control" value="{{ $v->vehicle_color }}">
                    </div>
                    <div class="mb-3">
                        <label>Year (ကားထုတ်လုပ်သည့်ခုနှစ်)</label>
                        <input type="text" name="vehicle_year" class="form-control" value="{{ $v->vehicle_year }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label>Owner Name(ယာဥ်ပိုင်ရှင်အမည်)</label>
                        <input type="text" name="owner_name" class="form-control" value="{{ $v->owner_name }}">
                    </div>
                    
                    <div class="mb-3">
                        <label>Phone (ဖုန်း)</label>
                        <input type="text" name="phone" class="form-control" value="{{ $v->phone }}">
                    </div>
                    <br>
                    <a href="{{ url()->previous() }}" class="btn btn-secondary">Back (နောက်သို့ပြန်သွားမည်)</a>
                    <input type="submit" value="Save (သိမ်းမည်)" class="btn btn-success">
                    
                </div>
            </div>
        </form>
        @endforeach
    </div>
@endsection
