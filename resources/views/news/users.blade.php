@extends('layouts.app')
@section('title', "List of App Users")
@section('content')
<div class="container">
    <div class="text-center mb-2 p-2">
        
        <h3 class="text-danger"><b>Here is the List of All the Registered Users</b></h3>
    </div>
<table class="table table-dark">
    <thead>
      <tr>
        <th scope="col">S/N</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($users as $key => $user)
            <tr>
                <th scope="row">{{$key+1}}</th>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>
                  
                    <div class="d-flex">
                         <form action="{{route('user.destroy', $user->id)}}" method="post">
                            @csrf
                            @method('delete')

                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>

                   
                </td>
          </tr>
        @endforeach
     
    </tbody>
  </table>

</div>

@endsection