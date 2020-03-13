@extends('layouts.app')
@section('title', 'Read All News')
@section('content')

    <h1 class="text text-center text-info"><b>Welcome to the Best News Arena</b></h1>
    @include('inc.message')
    <div class="row">
    @foreach ($news as $new)
    <div class="col-md-4 mb-2" id="cardo"><a href="{{route('news.show', $new->id)}}" class="list-group-item list-group-item-action flex-column align-items-start">
        <h4><b class="text-danger">{{$new->title}} </b><small>created by {{$new->user->name}}</small> </h4>
            <p >{!! Str::words($new->body, 70, '...<b class = "text-info">Read More</b>') !!}</p>
            <small class="text text-danger"><b>Posted about {{ Carbon\Carbon::parse($new->created_at)->diffForHumans() }}</b></small></a>
        </div>
        @endforeach
        
    </div>
    <div class="align-self-center">

        {{$news->links()}}

    </div>

    
@endsection