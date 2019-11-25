
@extends('layouts.app')

@section('title', 'Sites')

@section('content')
<div class="container-fluid">
      <h2>Adding sucriber</h2><br/>
      <form method="post" action="{{route('subscribers.store')}}" enctype="multipart/form-data">
        @csrf
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="Name">Name:</label>
            <input type="text" class="form-control" name="name">
          </div>
        </div>
        <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="base_url">Surname:</label>
              <input type="text" class="form-control" name="surname">
            </div>
          </div>
        <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="base_url">email:</label>
              <input type="text" class="form-control" name="email">
            </div>
        </div>
        <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="category_page">Status:</label>
              <input type="text" class="form-control" name="status">
            </div>
          </div>
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4" style="margin-top:60px">
            <button type="submit" class="btn btn-success">Submit</button>
          </div>
        </div>
      </form>
    </div>
@endsection