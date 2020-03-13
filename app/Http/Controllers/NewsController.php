<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     //Method for displaying index page
    public function index()
    {
        $news = News::orderBy('updated_at', 'desc')->paginate(12);

        return view('news.news', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

     //Method for creating news page
    public function create()
    {
       

        return view('news.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     //Method for saving news form after writing
    public function store(Request $request)
    {
        //Validating input fields

        $data = $this->validate($request, [

            'title' => 'required',
            'body' => 'required'
            
        ]);
        
        //saving validated inputs

        $data['user_id'] = auth()->user()->id;

        $news = News::create($data);

        return redirect('/')->with('newsPosted', 'Your news has been successfully posted. Thanks.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */

     //Method for displaying single news page

    public function show(News $news)
    {

        return view('news.show', compact('news'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */

     //Method for displaying editing news form
    public function edit(News $news)
    {
        return view('news.edit', compact('news'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */

     //Method for updating news page
    public function update(Request $request, News $news)
    {
        //Validating inputs on updating news form
          
        $data = $this->validate($request, [

            'title' => 'required',
            'body' => 'required'
            
        ]);
        
        //Updating news after validation
        if(auth()->user()->email == 'admin@gmail.com' || auth()->user()->id == $news->user_id){

            $news->update($data);

            return redirect('news/'. $news->id)->with('newsUpdated', 'Your news has been succefully updated. Thanks.');

        }

        return "unauthorised";
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */

     //Method for deleting news by Admin or by news poster
    public function destroy(News $news)
    {
        //Condition for deleting news by the Admin
        if(auth()->user()->email == 'admin@gmail.com' || auth()->user()->id == $news->user_id){

        $news->delete();

        return redirect('/')->with('newsDeleted', 'News deleted successfully. Thanks.');

        }

        return "Unauthorized!";
    }
}
