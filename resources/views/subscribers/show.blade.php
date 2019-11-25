
@extends('layouts.app')

@section('title', 'Sites')

@section('sidebar')
    @parent
@endsection

@section('content')
    @if (\Session::has('success'))
      <div class="alert alert-success">
        <p>{{ \Session::get('success') }}</p>
      </div><br />
     @endif
    <table class="table table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>url</th>
        <th>sites_id</th>
        <th>cat_template</th>
        <th>link_template</th>
        <th colspan="2">Action</th>
      </tr>
    </thead>
    <tbody>
      
      @foreach($categories as $cat)
      <tr>
        <td>{{$cat['id']}}</td>
        <td>{{$cat['name']}}</td>
        <td>{{$cat['url']}}</td>
        <td>{{$cat['sites_id']}}</td>
        <td>{{$cat['cat_template']}}</td>
        <td>{{$cat['link_template']}}</td>
        <td><a href="{{action('CategoryController@edit', $cat['id'])}}" class="btn btn-warning">Edit</a></td>
        <td>
          <form action="{{action('CategoryController@destroy', $cat['id'])}}" method="post">
            @csrf
            <input name="_method" type="hidden" value="DELETE">
            <button class="btn btn-danger" type="submit">Delete</button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
@endsection