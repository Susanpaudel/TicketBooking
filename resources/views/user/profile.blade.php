@extends('layouts.app')

@section('content')
<div class="">

    <section class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
    <div class="col-sm-6">
    <h1>Profile</h1>
    </div>
    <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item active">User Profile</li>
    </ol>
    </div>
    </div>
    </div>
    </section>
    @if(Session::has('successMessage'))
    <div class="alert alert-success" role="alert" id="box">
       {{Session::get('successMessage')}}
      </div>
    @endif
    <section class="content">
    <div class="container-fluid">
    <div class="row">
    <div class="col-md-3">
    
    <div class="card card-primary card-outline">
    <div class="card-body box-profile">
    <div class="text-center">
    <img class="profile-user-img img-fluid img-circle" src="https://ui-avatars.com/api/?name={{Auth::user()->name}}" alt="User profile picture">
    </div>
    <h3 class="profile-username text-center">{{Auth::user()->name}}</h3>
    <p class="text-muted text-center">@if(Auth::user()->role==0)
        User
        @else
        Admin
    @endif
    </p>
    <ul class="list-group list-group-unbordered mb-3">
    <li class="list-group-item">
    <b>Followers</b> <a class="float-right">1,322</a>
    </li>
    <li class="list-group-item">
    <b>Following</b> <a class="float-right">543</a>
    </li>
    <li class="list-group-item">
    <b>Friends</b> <a class="float-right">13,287</a>
    </li>
    </ul>
   
    </div>
    
    </div>
    
    

    
    </div>
    
    <div class="col-md-9">
    <div class="card">
    <div class="card-header p-2">
    <ul class="nav nav-pills">
    <li class="nav-item"><a class="nav-link active" href="#settings" data-toggle="tab">Settings</a></li>
    <li class="nav-item"><a class="nav-link" href="#activity" data-toggle="tab">Ticket Bought</a></li>
    </ul>
    </div>
    <div class="card-body">
    <div class="tab-content">
        <div class="tab-pane active" id="settings">
            <form class="form-horizontal" action="{{route('updateprofile')}}" method="POST">
            @csrf
            <div class="form-group row">
            <label for="inputName" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-10">
            <input type="text" name="name" class="form-control" id="inputName" placeholder="Name" value="{{auth()->user()->name}}">
            @error('name')
              <span>{{$message}}</span>   
            @enderror
            </div>
            </div>
            <div class="form-group row">
            <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
            <input type="email" class="form-control" id="inputEmail" placeholder="Email" value="{{auth()->user()->email}}" disabled>
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else. If want to change email contact with administration.</div>
            </div>
            </div>
            <div class="form-group row">
            <label for="inputExperience" class="col-sm-2 col-form-label">Mobile Number</label>
            <div class="col-sm-10">
                <input type="text" name="number" class="form-control" id="inputSkills" placeholder="phone number" value="{{auth()->user()->mobilenumber}}">
                @error('number')
              <span>{{$message}}</span>   
            @enderror
            </div>
            </div>
            <div class="form-group row">
            <label for="inputSkills" class="col-sm-2 col-form-label">Account Opened At</label>
            <div class="col-sm-10">
                <label for="inputSkills" class="col-sm-6 col-form-label">{{auth()->user()->created_at->toFormattedDateString()}}</label>
            </div>
            </div>
            <div class="form-group row">
            <div class="offset-sm-2 col-sm-10">
            <button type="submit" class="btn btn-danger">Update Profile</button>
            </div>
            </div>
            </form>
            </div>



    <div class="tab-pane" id="activity">
        <table class="table">
            <tr>
                <th>Going From:</th>
                <th>Going To:</th>
                <th>No. of Person</th>
                <th>Total Amount</th>
                <th>Action</th>
            </tr>
            <tbody>
                @if($booked->count()>0)
                @foreach ($booked as $item)
                <tr>
                    <td>{{$item->travels->leavingcities->city}}</td>
                    <td>{{$item->travels->goingcities->city}}</td>
                    <td>
                        @if($item->travels->available>0)
                        <form action="{{route('booking.update')}}" method="POST" class="d-flex">
                            @csrf
                            @method('PUT')
                            <input type="hidden" value="{{$item->id}}" name="booking_id">
                            <input type="number" name="no_of_seat" class="form-control me-1 @error('no_of_seat') is-invalid @enderror" value="{{$item->no_of_seats}}" min="1" max="{{$item->travels->available}}"/>
                            <button class="btn btn-secondary" type="submit">Update</button>
                        </form>
                        @else
                          {{$item->no_of_seats}} (Seat Reserved)
                        @endif
                    </td>
                    <td>Rs. {{$item->total_amount}}</td>
                    <td>
                        <div class="d-flex">
                            <a href="{{route('userview',['view'=>$item->travels->slug])}}" class="me-3"><button type="button" class="btn btn-secondary" data-bs-toggle="tooltip" data-bs-placement="bottom" title="View Details"><i class="fa fa-eye"></i></button></a>
                            <form action="{{route('booking.destroy',['book'=>$item->id])}}" method="POST">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger show_confirm" data-toggle="tooltip" title='Cancel Ticket'><i style="font-size:20px" class="fa">&#xf00d;</i></button>
                             </form>
                        </div>
                       
                    </td>
                </tr>
                @endforeach
                @else
                <h1>You havenot booked a Ticket Yet !!!</h1>
                @endif
            </tbody>
        </table>
     
           
      
    </div>
    </div>
    
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
    <script>
        $('.show_confirm').click(function(event) {
             var form =  $(this).closest("form");
             var name = $(this).data("name");
             event.preventDefault();
             swal({
                 title: `Are you sure you want to Cancel Your ticket?`,
                 text: "If you delete this, your seat will be cancel.",
                 icon: "warning",
                 buttons: true,
                 dangerMode: true,
             })
             .then((willDelete) => {
               if (willDelete) {
                 form.submit();
               }
             });
         });
       </script>
    
    
   
    
    </div>
    
    </div>
    </div>
    
    </div>
    
    </div>
    
    </div>
    </section>
    
    </div>
<script>
     setTimeout(() => {
const box = document.getElementById('box');
box.style.display = 'none';
}, 1000);
    </script>
@endsection