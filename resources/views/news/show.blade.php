@extends('layouts.app')
@section('title', "Reading".' '. $news->user->name."'s ". "post")

@section('content')
@include('inc.message')
    <div class="card col-md-10">
        <div class="card-body">
             <h5 class="text text-center"><b class="text-danger">{{$news->title}}</b><br /><small>posted by {{$news->user->name}} posted exactly {{ Carbon\Carbon::parse($news->created_at)->diffForHumans() }}</small></h5>
                <p>{{$news->body}}</p>
                
                @if(auth()->user()->email == 'admin@gmail.com' || auth()->user()->id == $news->user_id)

                <div class="d-flex p-2">
                    <a href="{{route('news.edit', $news->id)}}" class="btn btn-info">Edit</a>

                    <form action="{{route('news.destroy', $news->id)}}" method="post" class="ml-1">
                        @csrf
                        @method('delete')

                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            @endif
       </div>
       
    </div>

@endsection