
@extends('layouts.app')

@section('title', 'Suscriber Edit')


@section('content')
<div class="container-fluid">
      <h2>Edit A Form</h2><br  />
        <form method="post" action="{{route('subscribers.update',$subscriber)}}">
        @csrf
        <input name="_method" type="hidden" value="PATCH">
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="name">Name:</label>
            <input type="text" class="form-control" name="name" value="{{$subscriber->name}}">
          </div>
        </div>
        <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="base_url">surname</label>
              <input type="text" class="form-control" name="surname" value="{{$subscriber->surname}}">
            </div>
          </div>
        <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="base_url">email</label>
              <input type="text" class="form-control" name="email" value="{{$subscriber->email}}">
            </div>
        </div>
        <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="category_page">status</label>
              <input type="text" class="form-control" name="status" value="{{$subscriber->status}}">
            </div>
          </div>
        
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4" style="margin-top:60px">
            <button type="submit" class="btn btn-success" style="margin-left:38px">Update</button>
          </div>
        </div>
      </form>
    </div>
@endsection