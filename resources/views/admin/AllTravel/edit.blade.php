@extends('layouts.admin')
@section('admin-content')
@section('title'){{ 'Edit Ticket'}}@endsection
<div class="container">
    <div class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0">Edit Ticket</h1>
        </div>
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{route('travel.index')}}">Home</a></li>
        <li class="breadcrumb-item active">Edit Ticket Page</li>
        </ol>
        </div>
        </div>
    </div>
    <div class="card shadow p-3">
       <form action="{{route('travel.update',['travel'=>$travel->slug])}}" method="POST" enctype="multipart/form-data">
           @csrf
           @method('PUT')
           <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="exampleInput" class="form-label">Leaving City From</label>
                    <select id="leaving" data-live-search="true" class="form-select  @error('leavingcity') is-invalid @enderror" name="leavingcity" aria-label="Default select example">
                        <option selected disabled value="leaving">Select Leaving City Name</option>
                        @foreach($leavingcityname as $city)
                        <option value="{{$city->id}}" {{($travel->leavingcities->id == $city->id) ? 'selected' : ''}}>{{$city->city}}</option>
                        @endforeach
                      </select>
                    @error('leavingcity')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                   @enderror
                  </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="exampleInput" class="form-label">Going Destination</label>
                    <select id="going" class="form-select  @error('goingcity') is-invalid @enderror" name="goingcity" aria-label="Default select example">
                        <option selected disabled value="going">Select going city Name</option>
                        @foreach($goingcityname as $city)
                        <option value="{{$city->id}}" {{($travel->goingcities->id == $city->id) == $city->id ? 'selected' : ''}}>{{$city->city}}</option>
                        @endforeach
                      </select>
                    @error('goingcity')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                   @enderror
                  </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="exampleInput" class="form-label">Departure | Shift</label>
                    <input type="time" name="departure" class="form-control @error('departure') is-invalid @enderror" id="exampleInput" placeholder="enter Departure" value="{{date('H:i', strtotime($travel->Departure))}}">
                    @error('departure')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                   @enderror
                  </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="exampleInput" class="form-label">Available Seat</label>
                    <input type="number" name="seatAvailable" min="1" max="56" class="form-control @error('seatAvailable') is-invalid @enderror" id="exampleInput" placeholder="enter seatAvailable" value="{{$travel->available}}">
                    @error('seatAvailable')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                   @enderror
                  </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="exampleInput" class="form-label">Price</label>
                    <input type="text" name="price" class="form-control @error('price') is-invalid @enderror" id="exampleInput" placeholder="enter price" value="{{$travel->price}}">
                    @error('price')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                   @enderror
                  </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="exampleInput" class="form-label ">Choose Travels Name</label>
                    <select id="travelname" class="form-select  @error('travelname') is-invalid @enderror" name="travelname" aria-label="Default select example">
                        <option selected disabled value="name">Select Travels Name</option>
                        @foreach($travelname as $travelnames)
                        <option value="{{$travelnames->id}}" {{($travel->travelnames->id == $travelnames->id) ? 'selected' : ''}}>{{$travelnames->travel_name}}</option>
                        @endforeach
                      </select>
                    @error('travelname')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                   @enderror
                  </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="exampleInput" class="form-label ">Choose Bus Type</label>
                    <select id="bustype" class="form-select  @error('traveltype') is-invalid @enderror" name="traveltype" aria-label="Default select example">
                        <option selected disabled value="type">Select Bus Type</option>
                        @foreach($traveltype as $traveltypes)
                        <option value="{{$traveltypes->id}}" {{($travel->bustypes->id == $traveltypes->id) == $traveltypes->id ? 'selected' : ''}} >{{$traveltypes->bus_type_name}}</option>
                        @endforeach
                      </select>
                    @error('traveltype')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                   @enderror
                  </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    @php
                      use Carbon\Carbon;   
                    @endphp
                    <label for="exampleInput" class="form-label ">Travel Date</label>
                    <input type="date" name="travel_date" class="form-control @error('travel_date') is-invalid @enderror" placeholder="enter travel date" value="{{Carbon::parse($travel->travel_date)->format('Y-m-d')}}"/>
                    @error('travel_date')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                   @enderror
                  </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="exampleInput" class="form-label">Travels Image</label>
                    <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" id="exampleInput"/>
                    <img src='{{asset("images/$travel->image")}}' alt="{{$travel->image}}" class="img-fluid mt-2" style="height:100px;width:100px;"/>
                    @error('image')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                   @enderror
                  </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="exampleInput" class="form-label ">Bus Number</label>
                    <input type="text" name="busno" class="form-control @error('busno') is-invalid @enderror" placeholder="enter bus plate Number" value="{{$travel->bus_plate_number}}"/>
                    @error('busno')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                   @enderror
                  </div>
            </div>
           </div>
          <div class="mt-5 d-flex justify-content-between">
            <button type="submit" class="btn btn-secondary">Update Travels</button>
          </div>
       
       </form>
    </div>
</div>



@endsection