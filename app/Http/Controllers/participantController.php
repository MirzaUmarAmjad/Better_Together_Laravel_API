<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Participant;


class participantController extends Controller
{
    public function index() {
        return Participant::orderBy('created_at', 'asc')->get();
  }


  // Store a newly created resource in storage.   
  // @param  \Illuminate\Http\Request  $request

  // @return \Illuminate\Http\Response

  public function store(Request $request) {
      //storing new values in the database

     $user = new Participant;
      $user->user_id = $request->input('user_id'); //retrieving user inputs
      $user->event_id = $request->input('event_id');  //retrieving user inputs
      $user->save(); //storing values as an object
      return $user; //returns the stored value if the operation was successful.
 
  }

  // // Display the specified resource.
  // @param  int  $id

  // @return \Illuminate\Http\Response

  public function show($id) {
  //viewing a particular User from a database
     return Participant::where('user_id', $id)->get(); //searches for the object in the database using its id and returns it.

  }

  

  // // Update the specified resource in storage.

  //  @param  \Illuminate\Http\Request  $request

  //  @param  int  $id

  //  @return \Illuminate\Http\Response

  public function update(Request $request, $id) {
     

      $user = Participant::findorFail($id); // uses the id to search values that need to be updated.
      $user->user_id = $request->input('user_id'); //retrieving user inputs
      $user->event_id = $request->input('event_id');  //retrieving user inputs
      $user->save();//saves the values in the database. The existing data is overwritten.
      return $user; // retrieves the updated object from the database
  }

  // // Remove the specified resource from storage.

  //  @param  int  $id

  //  @return \Illuminate\Http\Response

  public function destroy($id) {
      //deleting data
     $user = Participant::findorFail($id); //searching for object in database using ID
      if($user->delete()){ //deletes the object
          return 'deleted successfully'; //shows a message when the delete operation was successful.
      }
  }
}
