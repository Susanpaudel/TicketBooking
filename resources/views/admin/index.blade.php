@extends('layouts.admin')
@section('admin-content')
@section('title'){{ 'Admin Dashboard'}}@endsection
<div class="" >

    <div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
    <div class="col-sm-6">
    <h1 class="m-0">Dashboard</h1>
    </div>
    <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="{{route('admindashboard')}}">Home</a></li>
    <li class="breadcrumb-item active">Dashboard</li>
    </ol>
    </div>
    </div>
    </div>
    </div>
    
    
    <section class="content">
    <div class="container-fluid">
    
    <div class="row">
    <div class="col-lg-3 col-6">
    
    <div class="small-box bg-info">
    <div class="inner">
    <h3>{{$travel}}</h3>
    <p>Tickets</p>
    </div>
    <div class="icon">
    <i class="fa fa-ticket"></i>
    </div>
    <a href="{{route('travel.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
    </div>
    
    <div class="col-lg-3 col-6">
    
    <div class="small-box bg-success">
    <div class="inner">
    <h3>{{$travelname}}</h3>
    <p>Travel Name</p>
    </div>
    <div class="icon">
    <i class="fas fa-bus-alt"></i>
    </div>
    <a href="{{route('travelname.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
    </div>
    
    <div class="col-lg-3 col-6">
    
    <div class="small-box bg-warning">
    <div class="inner">
    <h3>{{$bustype}}</h3>
    <p>Bus Type</p>
    </div>
    <div class="icon">
     <i class="fas fa-caravan"></i>
    </div>
    <a href="{{route('traveltype.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
    </div>
    
    <div class="col-lg-3 col-6">
    
    <div class="small-box bg-danger">
    <div class="inner">
    <h3>{{$user}}</h3>
    <p>Users</p>
    </div>
    <div class="icon">
    <i class="fa fa-user"></i>
    </div>
    <a href="{{route('adminUser')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  
    
    </div>
    <div class="col-lg-3 col-6">
    <div class="small-box bg-secondary">
        <div class="inner">
        <h3>{{$booking}}</h3>
        <p>Booking</p>
        </div>
        <div class="icon">
        <i class="fa fa-book"></i>
        </div>
        <a href="{{route('booked.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    </div>
    </div>

    @endsection