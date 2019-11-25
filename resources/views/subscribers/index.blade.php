
@extends('layouts.app')

@section('title', 'Subscribers')

@section('content')
   <div class="container-fluid">
    <br />
    @if (\Session::has('success'))
      <div class="alert alert-success">
        <p>{{ \Session::get('success') }}</p>
      </div><br />
     @endif
    <a href="{{route('subscribers.create')}}" class="btn btn-primary pull-right"><i class="fa fa-plus-square-o"></i> Add subscriber</a>
    <br>
    <table class="table table-striped">
    <thead> 
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Surname</th>
        <th>Email</th>
        <th>status</th>
        <th colspan="4">Action</th>
      </tr>
    </thead>
    <tbody>
      
      @foreach($subscribers as $subscriber)
      <tr>
        <td>{{$subscriber['id']}}</td>
        <td>{{$subscriber['name']}}</td>
        <td>{{$subscriber['surname']}}</td>
        <td>{{$subscriber['email']}}</td>
        <td>{{$subscriber['status']}}</td>
        
        <td><a href="{{action('SubscribersController@edit', $subscriber['id'])}}" class="btn btn-warning">Edit</a></td>
        <td>
          <form action="{{action('SubscribersController@destroy', $subscriber['id'])}}" method="post">
            @csrf
            <input name="_method" type="hidden" value="DELETE">
            <button class="btn btn-danger" type="submit">Delete</button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection
