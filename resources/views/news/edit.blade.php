@extends('layouts.app')

@section('content')

<div class="col-md-10 align-self-center">
  
  <h3 class="text text-center">Write Your News</h3>
  
    <form action="{{route('news.update', $news->id)}}" method="post">
    @method('put')
     @csrf
      <div class="form-group">
        <label for="title">News Title</label>
        <input type="text" class="form-control"  placeholder="Write news title here..." name="title" value="{{$news->title}}">
      </div>
      
      <div class="form-group">
        <label for="body">News Details</label>
         <textarea class="form-control" rows="5" placeholder="Write yours news details here..." name="body">{{$news->body}}</textarea>
      </div>

      <button type="submit" class="btn btn-info">Update your news</button>
    </form>

</div>
@endsection