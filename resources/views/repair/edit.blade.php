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
        @foreach ($repairs as $r )        
        <form method="post">
            @csrf
            <div class="row text-white">
                <div class="col-md-6">
                        <input type="hidden" name="vehicle_id" value="{{ $r->vehicle_id }}">
                    <div class="mb-3">
                        <label>Complain (တင်ပြချက်)</label>
                        <input type="text" name="repair_complain" class="form-control" value="{{ $r->repair_complain }}">
                    </div>
                    <div class="mb-3">
                        <label>Diagnostic (စစ်ဆေးခြင်း)</label>
                        <input type="text" name="repair_diagnostic" class="form-control" value="{{ $r->repair_diagnostic }}">
                    </div>                    
                    <div class="mb-3">
                        <label>Replace Parts & Repair (ပြောင်းလဲတတ်ဆင်သောအပိုပစ္စည်း နှင့် ပြုပြင်ခြင်း)</label>
                        {{-- <input type="text" name="repair_parts" class="form-control"> --}}
                        <textarea name="repair_parts" class="form-control" cols="30" rows="10">{{ $r->repair_parts }}</textarea>
                    </div>                    
                </div>
                <div class="col-md-6">
                    
                    <div class="mb-3">
                        <label>Received Date (လက်ခံရက်)</label>
                        <input type="date" name="repair_received_date" class="form-control" value="{{ $r->repair_received_date }}">
                    </div>
                    <div class="mb-3">
                        <label>Delivered Date (ပြန်အပ်ရက်)</label>
                        <input type="date" name="repair_delivered_date" class="form-control" value="{{ $r->repair_delivered_date }}">
                    </div>
                    <div class="mb-3">
                        <label>Repair By (ပြင်ဆင်သူ)</label>
                        <input type="text" name="repair_technician_id" class="form-control" value="{{ $r->repair_technician_id }}">
                    </div>
                    <div class="mb-3">
                        <label>Remark (မှတ်ချက်)</label>
                        <input type="text" name="repair_remarks" class="form-control" value="{{ $r->repair_remarks }}">
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
