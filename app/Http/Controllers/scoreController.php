<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Score;


class scoreController extends Controller
{
    
  public function index() {
        return Score::orderBy('points', 'asc')->get();
  }


  // Store a newly created resource in storage.   
  // @param  \Illuminate\Http\Request  $request

  // @return \Illuminate\Http\Response

  public function store(Request $request) {
      //storing new values in the database

      $user = new Score;
      $user->user_id = $request->input('user_id'); //retrieving user inputs
      $user->event_id = $request->input('event_id');  //retrieving user inputs
      $user->points = $request->input('points');  //retrieving user inputs
      $user->save(); //storing values as an object
      return $user; //returns the stored value if the operation was successful.
 
  }

  // // Display the specified resource.
  // @param  int  $id

  // @return \Illuminate\Http\Response

  public function show($id) {
  //viewing a particular User from a database
     return Score::where('user_id', 1)->get(); //searches for the object in the database using its id and returns it.

  }

  

  // // Update the specified resource in storage.

  //  @param  \Illuminate\Http\Request  $request

  //  @param  int  $id

  //  @return \Illuminate\Http\Response

  public function update(Request $request, $id) {
     

      $user = Score::findorFail($id); // uses the id to search values that need to be updated.
      $user->user_id = $request->input('user_id'); //retrieving user inputs
      $user->event_id = $request->input('event_id');  //retrieving user inputs
      $user->points = $request->input('points');  //retrieving user inputs
      $user->save();//saves the values in the database. The existing data is overwritten.
      return $user; // retrieves the updated object from the database
  }

  // // Remove the specified resource from storage.

  //  @param  int  $id

  //  @return \Illuminate\Http\Response

  public function destroy($id) {
      //deleting data
     $user = Score::findorFail($id); //searching for object in database using ID
      if($user->delete()){ //deletes the object
          return 'deleted successfully'; //shows a message when the delete operation was successful.
      }
  }
}
