<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

     //Method for displaying user's dashboard
    public function index()
    {

        return view('dashboard');
    }

    //Method for displaying all users for Admin's view
   public function showUsers(){
    
    

        $users = User::all();

        return view('news.users', compact('users'));
    

   }

  //Method for deleting users and their associated post(s)
   public function delUsers(User $user){

    
    if(auth()->user()->email !== 'admin@gmail.com')


    {
       foreach($user->news as $new){

            $new->delete();

       }

            $user->delete();

            return back();

   }

   return back();

}

}
