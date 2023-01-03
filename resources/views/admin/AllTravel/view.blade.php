@extends('layouts.admin')
@section('admin-content')
@section('title'){{ 'View Ticket'}}@endsection
<div class="container">
    <div class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0">View Ticket</h1>
        </div>
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{route('travel.index')}}">Home</a></li>
        <li class="breadcrumb-item active">View Ticket Page</li>
        </ol>
        </div>
        </div>
    </div>
    <div class="card shadow p-4">
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
                   @endif</p>
            </div>
            <div class="col-md-4">
                <p><b>Price</b></p>
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
                <a href="{{route('travel.index')}}"><button type="submit" class="btn btn-secondary">Go Back</button></a>
            </div>
        </div>
    </div>
</div>
@endsection