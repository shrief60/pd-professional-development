<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Learner;
class UsersController extends Controller
{
    public function home(){
        return view('users.home');

        
    }
  
    
    public function search(Request $request)
{

  $query = $request->input('search');

  $searchs = User::where('email','LIKE','%'.$query.'%') -> paginate(10);
      
  
  return view('users.search', compact('searchs', 'query'));
 }
}
