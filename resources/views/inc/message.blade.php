

@if(session("newsPosted"))
   
    <div class="alert alert-success mb-2">
        
        {{session('newsPosted')}}

    </div>
   

@endif


@if(session("newsDeleted"))
   
    <div class="alert alert-danger mb-2">
        
        {{session('newsDeleted')}}

    </div>
   

@endif


@if(session("newsUpdated"))
   
    <div class="alert alert-success mb-2">
        
        {{session('newsUpdated')}}

    </div>
   

@endif


