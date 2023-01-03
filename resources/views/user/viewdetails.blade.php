@extends('layouts.app')

@section('content')

<div class="card shadow p-4" style="width:80%;margin:0px auto">
    <div class="row">
        <div class="col-md-4">
             <p><b>Travel Name</b></p>
             <p>{{$travel->travelnames->travel_name}}</p>
        </div>
        <div class="col-md-4">
            <p><b>Bus Type</b></p>
            <p>{{$travel->bustypes->bus_type_name}}</p>
        </div>
        <div class="col-md-4">
            <p><b>Available Seat</b></p>
            <p>{{$travel->available}} Seats</p>
        </div>
        <div class="col-md-4">
            <p><b>Leaving City</b></p>
            <p>{{$travel->leavingcities->city}}</p>
        </div>
        <div class="col-md-4">
            <p><b>Going City</b></p>
            <p>{{$travel->goingcities->city}}</p>
        </div>
        <div class="col-md-4">
            <p><b>Departure</b></p>
            <p>{{$travel->Departure}} 
                @php
                 use Carbon\Carbon;   
                @endphp
                @if(Carbon::parse($travel->Departure)->format('H')>=12)
                    PM
                @else
                    AM
                @endif
            </p>
        </div>
        <div class="col-md-4">
            <p><b>Price Per Person</b></p>
            <p>Rs. {{$travel->price}}</p>
        </div>
        <div class="col-md-4">
            <p><b>Travel Date</b></p>
            <p>{{Carbon::parse($travel->travel_date)->format('Y-m-d')}}</p>
        </div>
        <div class="col-md-4">
            <p><b>Bus Number</b></p>
          <p>{{$travel->bus_plate_number}}</p>
        </div>
        <div class="col-md-12">
            <p><b>Avatar</b></p>
            <img src='{{asset("images/$travel->image")}}' alt="{{$travel->image}}" style="height:100px;width:100px;"/>
        </div>
        <div class="col-md-4 mt-5">
            <a href="{{route('userprofile')}}"><button type="submit" class="btn btn-secondary">Go Back</button></a>
        </div>
    </div>
</div>


@endsection