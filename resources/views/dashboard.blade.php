@extends('layouts.app')
@section('title', "This is".' '.auth()->user()->name."'s ". 'dashboard')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-body">
                    <h4 class="text text-center"><b class="text-danger">Welcome to your dashboard, {{auth()->user()->name}}!</b></h4>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Kindly go ahead and write your fantastic news <a href="{{route('news.create')}}">here</a>

                 </div>
                 
            </div>

            @if((auth()->user()->news)->count() > 0)
            <div class="mt-5">

                <h3>Here is the list of all the news you have posted:</h3>
                
                <div>
                    @foreach (auth()->user()->news as $key => $new)
                    <p>{{$key+1}}.<b><a href="{{route('news.show', $new->id)}}"> {{$new->title}}</a></b></p>
                    
                    @endforeach
                  
                </div>
            </div>
           @else

           <div class="mt-3">

                <h5 class="text-success">You have not posted any news yet. Kindly crate one now! Thanks.</h5>

           </div>


           @endif
        </div>
    </div>
</div>
@endsection
