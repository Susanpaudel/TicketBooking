@extends('layouts.admin')
@section('admin-content')
@section('title'){{ 'Add Travels Type'}}@endsection
<div class="container">
    <div class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0">Add Travel Type</h1>
        </div>
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{route('traveltype.index')}}">Home</a></li>
        <li class="breadcrumb-item active">Add Travel Name</li>
        </ol>
        </div>
        </div>
    </div>
   <div class="card my-5 shadow">
    <form action="{{route('traveltype.store')}}" method="post">
        @csrf
        <div class="row p-3">
            <div class="col-md-6 ">
                <div class="mb-3">
                    <input type="text" name="bus_type_name" class="form-control @error('bus_type_name') is-invalid @enderror" id="exampleFormControlInput1" placeholder="enter bus type name" value="{{old('bus_type_name')}}"/>
                    @error('bus_type_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                  </div>
            </div>
            <div class="col-md-6">
                <button type="submit" class="btn btn-primary">Add bus type</button>
            </div>
        </div>
       
    </form>
   </div>
</div>
@endsection