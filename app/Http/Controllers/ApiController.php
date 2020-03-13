<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;
use App\Http\Resources\ApiResource as NewsResource;

class ApiController extends Controller
{
   public function allArticles():NewsResource
   
   {
    
    
    return new NewsResource(News::paginate());

   }

   public function singleArticle(News $news){
    
    return new NewsResource($news);
    
   }

}
