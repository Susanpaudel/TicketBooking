@extends('layouts.app')

@section('content')
<div class="container py-5">
    <!--display order details header -->
    @if (Session::has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{Session::get('success')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif
    @if($data)
    <div class="row">
        <div class="col-md-6">
            <div class="card p-1 text-center shadow">
            <table class="table table-success table-striped">
                 <tr>
                    <th>Travel Info</th>
                    <th>Price</th>
                    <th>No.of Seats</th>
                    <th>Total Amount</th>
                 </tr>
                 <tbody>
                    <tr>
                        <td>{{$data->travels->leavingcities->city}} - {{$data->travels->goingcities->city}}</td>
                        <td>Rs. {{$data->travels->price}}</td>
                        <td>{{$data->no_of_seats}}</td>
                        <td>Rs. {{$data->total_amount}}</td>
                    </tr>
                 </tbody>
            </table>
            </div>
        </div>
        <div class="col-md-6">
           
                <!--disply card -->
                <div class="card p-5 text-center shadow">
                    <h1>Thanks For Buying Ticket</h1>
                    <i class="fa fa-shopping-bag fa-5x py-5"></i>
                    <!--button -->
                    <p>If wants to edit the tickets go to your profile or click the below button !</p>
                    <div class="d-flex justify-content-between">
                        <a href="{{route('userprofile')}}">
                            <button type="submit" class="btn btn-secondary">Go To Profile <i class="fa fa-arrow-right ps-3"></i></button>
                        </a>
                    </div>
                   
                </div>
          
        </div>
            
    </div>
    @else
    <div class="text-center my-5">
        <h1 class="my-5">Nothing to Checkout !!</h1>
    </div>
       
    @endif
</div>

@endsection