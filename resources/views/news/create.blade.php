@extends('layouts.app')
@section('title', "Post a news now")
@section('content')

<div class="col-md-10 col-sm-12 col-xs-12 align-self-center">
  
  <h3 class="text text-center text-danger"><b>Write Your News</b></h3>
  
    <form action="{{route('news.store')}}" method="post">
      @csrf
      <div class="form-group">
        <label for="title" class="text-danger"><b>News Title</b></label>
        <input type="text" class="form-control"  placeholder="Write news title here..." name="title">
      </div>
      
      <div class="form-group">
        <label for="body" class="text-danger"><b>News Details</b></label>
        <textarea class="form-control" rows="5" placeholder="Write yours news details here..." name="body"></textarea>
      </div>

      <button type="submit" class="btn btn-info">Save your news</button>
    </form>

</div>
@endsection